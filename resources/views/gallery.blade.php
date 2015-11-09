@extends('app') @section('extra_header')
<style type="text/css">
  ul {
    padding: 0 0 0 0;
    margin: 0 0 0 0;
  }

  ul li {
    list-style: none;
  }

  ul li img {
    cursor: pointer;
  }

  .controls {
    width: 50px;
    display: block;
    font-size: 18px;
    padding-top: 8px;
    font-weight: bold;
  }

  .next {
    float: right;
    text-align: right;
  }

  .overlaypic {
	  position: relative;
	  top: 0px;
	  width: 320px;
	  height: 240px;
	  opacity: 0.75;
	background-image: url('/img/sold.png');
	background-repeat: no-repeat;
  }

  .image_stat {
	margin-top: 0px !important;
	margin-bottom: 0px !important;
  }
</style>
{{--http://i.istockimg.com/file_thumbview_approve/57837952/6/stock-illustration-57837952-red-vector-grunge-stamp-sold.jpg--}}
<script type="text/javascript">
  $(document).on('click', 'a.controls', function() {
    //this is where we add our logic
    var index = $(this).attr('href');
    var src = $('ul.row li:nth-child(' + index + ') img').attr('src');
    $('.modal-body img').attr('src', src);

    var newPrevIndex = parseInt(index) - 1;
    var newNextIndex = parseInt(newPrevIndex) + 2;

    if ($(this).hasClass('previous')) {
      $(this).attr('href', newPrevIndex);
      $('a.next').attr('href', newNextIndex);
    } else {
      $(this).attr('href', newNextIndex);
      $('a.previous').attr('href', newPrevIndex);
    }

    var total = $('ul.row li').length + 1;
    //hide next button
    if (total === newNextIndex) {
      $('a.next').hide();
    } else {
      $('a.next').show()
    }
    //hide previous button
    if (newPrevIndex === 0) {
      $('a.previous').hide();
    } else {
      $('a.previous').show()
    }

    return false;
  });

  $(document).ready(function() {
    $('img.pop').on('click', function() {
      var src = $(this).attr('src');
      var img = '<img src="' + src + '" class="img-responsive center-block"/>';

      //Start of new code
      var index = $(this).parent('li').index();
      var html = '';
      html += img;
      html += '<div style="height:25px;clear:both;display:block;">';
      html += '<a class="controls next" href="' + (index + 2) + '">next &raquo;</a>';
      html += '<a class="controls previous" href="' + (index) + '">&laquo; prev</a>';
      html += '</div>';
      //End of new code

      $('#Popup').modal();
      $('#Popup').on('shown.bs.modal', function() {
        $('#Popup .modal-body').html(html);
      });
      $('#Popup').on('hidden.bs.modal', function() {
        $('#Popup .modal-body').html('');
      });

      $('#Popup').on('shown.bs.modal', function() {
        $('#myModal .modal-body').html(html);
        //this will hide or show the right links:
        $('a.controls').trigger('click');
      })
    });
  })
</script>
@stop @section('content')
<section class="{{ $PageTitleSlug }} wrap {{ $PageTitleSlug }}-bg">
  <div class="container wrap-xl" style="padding-top: 250px">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12 text-center">
            <h2 class="text-center mg-sm">{{ $PageTitle }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="wrap tc-white bg-cement-texture d-wrap bg-repeat" id="team-section">
  <div class="container wrap-lg">
    <ul class="row">
    @foreach($tGalleryImages as $objImage)
      <li class="col-md-4 image_stat">

        <div class="productbox" >

        <div class="">
          	{{--<img class="pop img-thumbnail center-block" src="/img/gallery_images/{{ $objImage->image_filename }}" />--}}
			<div class="center-block" style="background-image: url('/img/gallery_images/{{ $objImage->image_filename }}'); width:320px; height: 240px; background-size: 100%; background-repeat: no-repeat;">
				@if($objImage->sold)
					<div class="overlaypic"></div>
				@endif
			</div>
		</div>
		<span style="padding: 10px; display: block">

          <div class="producttitle text-center">{{ $objImage->title }}</div>
          <div class="row">
            <div class="text-left col-sm-6 image_stat">
              <span style="color: #333;">Mast Height: <span style="color: #b5b5b5">{{ $objImage->mast_height }}</span></span>
            </div>
			  <div class="text-left col-sm-6 image_stat">
				  <span style="color: #333;">Serial: <span style="color: #b5b5b5">{{ $objImage->serial }}</span></span>
			  </div>
          </div>

          <div class="row">
			  <div class="text-left col-sm-6 image_stat">
				  <span style="color: #333;">Make: <span style="color: #b5b5b5">{{ $objImage->make }}</span></span>
			  </div>
			  <div class="text-left col-sm-6 image_stat">
				  <span style="color: #333;">Model: <span style="color: #b5b5b5">{{ $objImage->model }}</span></span>
			  </div>

          </div>

          <div class="row">
            <div class="text-left col-sm-6 image_stat">
              <span style="color: #333;">Year: <span style="color: #b5b5b5">{{ $objImage->year }}</span></span>
            </div>
            <div class="text-left col-sm-6 image_stat">
              <span style="color: #333;">Hours: <span style="color: #b5b5b5">{{ $objImage->hours }}</span></span>
            </div>
          </div>

          <div class="row">
			  <div class="text-left col-sm-6 image_stat">
				  <span style="color: #333;">Warranty: <span style="color: #b5b5b5">{{ $objImage->warranty }}</span></span>
			  </div>
            <div class="text-left col-sm-6 image_stat">
              <span style="color: #333;">Price: <span style="color: red">{{ $objImage->price }}</span></span>
            </div>
          </div>
</span>
        </div>
      </li>
      @endforeach </ul>
  </div>
</div>
<div class="modal fade" id="Popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> </div>
    </div>
  </div>
</div>
@stop
