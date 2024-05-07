<div class="sidebar-widget post-widget">
    <div class="widget-title">
        <h4>User Profile </h4>
    </div>
    <div class="post-inner">
        <div class="post">
            <figure class="post-thumb"><a href="blog-details.html">
            <img src="{{!empty($data->image)? url('images/user_images/'.$data->image) : url('images/no_image.jpg')}}" alt=""></a></figure>
            <h5><a href="blog-details.html"> {{ $data->name }} </a></h5>
            <p> {{ $data->email }} </p>
        </div> 
    </div>
</div> 