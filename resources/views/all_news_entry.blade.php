@extends('app')
@section('extra_header')
    <style>
        hr {
            opacity: .1;
        }

        h1 p span {
            font-size: 50px !important;
        }

        h1 {

            margin-bottom: 60px;
        }

        .blog-image {
            height: 300px;
        }

        .blogentrycontainer {
            margin-top: 20px;
            height: 350px;
        }

        h1, h2, h3, h4 {
            color: #999;
        }

        em {
            display: inline-block;
            color: #ccc;
            margin-right: 10px;
        }
        .blog-entry{
            background-color: #fff;
            border: 1px solid #999;
            padding-top: 10px;
            padding-bottom: 10px;
            line-height: 1.1;
            margin-right: 15px;
            margin-top: 20px;
            height: 800px;
        }
        .blog-entry img{
            border: none;
            padding: 0;
            margin-bottom: 10px;
        }
        .blog-entry hr{
            margin: 10px;
        }
        .blog-entry .title{
            font-size: 20px;
            color: #999;
            max-height: 68px;
            overflow: hidden;
        }
        .blog-entry .btn{
            margin: 0 auto;
            position: relative;
            bottom: 40px;
        }
    </style>
@stop
@section('content')


    <section class="wrap blog" style="padding-top: 100px;">
        <div class="container wrap-xl" style="margin-top: 60px;">
            <h1 class="text-center">JVEquipment News</h1>
            <hr/>
            <div class="row">
                <?php $Count = 0; ?>
                @foreach($tAllPosts as $objPost)
                    <?php $Count++; ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 blog-entry">
                        <img class="center-block img-thumbnail blog-image" src='/img/blog_images/{{ $objPost->image_filename }}'/>
                        <div class="title"><em>{{ date('d M', strtotime($objPost->updated_at)) }}</em>{!! $objPost->title !!}</div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-justify blogentrycontainer" style="">
                                {!! substr($objPost->entry, 0, 500) !!}
                                <?php
                                if (strlen($objPost->entry) > 500)
                                    echo "..."
                                ?>

                            </div>
                        </div>
                        <a class='btn btn-default' href='/news_entry/view/{$objPost->id}'>Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop

