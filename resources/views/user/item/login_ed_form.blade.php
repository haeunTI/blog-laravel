<div class="form-inner">
    <form action="{{ route('item.detail.qna') }}" method="post" class="default-form">
        @csrf
        <input type="hidden" name="id_user" value="{{ $userData->id }}">
        <input type="hidden" name="id_agent" value="{{ $agent->id }}">
        <input type="hidden" name="id_item" value="{{ $data->id }}">
        
        <div class="form-group">
            <input type="text" name="name" placeholder="Your name" required="" value="{{ $userData->name }}">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" required="" value="{{ $userData->email }}">
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Phone" required="" value="{{ $userData->phone }}">
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Message"></textarea>
        </div>
        <div class="form-group message-btn">
            <button type="submit" class="theme-btn btn-one">Send Message</button>
        </div>
    </form>
</div>