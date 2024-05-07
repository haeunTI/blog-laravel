<div class="form-inner">
    <form action="{{ route('item.detail.qna') }}" method="post" class="default-form">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Your name" required="">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" required="">
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone" required="">
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Message"></textarea>
        </div>
        <div class="form-group message-btn">
            <button type="submit" class="theme-btn btn-one">Send Message</button>
        </div>
    </form>
</div>