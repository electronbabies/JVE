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
            height: 260px;
            overflow-y: hidden;
        }

		h2, h3, h4 {
            color: #999;
        }

		h1 {
			color: #555
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
            margin-right: 50px;
            margin-left: 50px;
            margin-top: 20px;
            margin-bottom:75px;
            height: 800px;
        }
        .blog-entry img {
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
            height: 85px;
            overflow: hidden;
        }

		/* Mobile */
		@media only screen
		  and (min-device-width: 320px)
		  and (max-device-width: 480px)
		  and (-webkit-min-device-pixel-ratio: 2) {

		  	.blog-entry {
		  		margin-left: 0px;
		  		margin-bottom:25px;
			}

		}

        /* Tablet */
		@media only screen
		  and (min-device-width: 768px)
		  and (max-device-width: 1024px)
		  and (-webkit-min-device-pixel-ratio: 1) {

			.blog-entry {
				height: 600px;
				margin-left: 0px;
				margin-bottom:25px;
			}

			.blog-entry .title{
            	height: 55px;
        	}

        	.blogentrycontainer {
				height: 90px;
			}

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
                            	{!! $objPost->entry !!}
                            </div>
                        </div>
                        <a class='btn btn-default' href='/news_entry/view/{$objPost->id}' style="margin-top: 70px;">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop

