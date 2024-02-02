  @extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-fluid h-100 ms-5">
			<div class="row justify-content-center h-100">
				<div class="col-md-8 col-xl-6 chat">
					<div class="card card1">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
                                @if($user!=null)
								<div class="user_info">
									<span>{{ $user->name }}</span>

								</div>
                                @else
                                <div class="user_info">
									<span>Group</span>

								</div>
                                @endif

							</div>
						</div>
						<div class="card-body msg_card_body">
                                        @if(!empty($messages))
                                            @foreach($messages as $m)

                                                @if($m['sender_id']==Auth::user()->id)

                                                        <div class="d-flex justify-content-start mb-4">
                                                            <div class="img_cont_msg">
                                                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                                            </div>
                                                            <div class="msg_cotainer">
                                                                {{ $m['message'] }}
                                                                <span class="msg_time">Today</span>
                                                            </div>
                                                        </div>


                                                @else

                                                        <div class="d-flex justify-content-end mb-4">
                                                            <div class="msg_cotainer_send">
                                                                {{ $m['message'] }}
                                                                <span class="msg_time_send">Today</span>
                                                            </div>
                                                            <div class="img_cont_msg">
                                                        <img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256" class="rounded-circle user_img_msg">
                                                            </div>
                                                        </div>

                                                @endif
                                                @endforeach
                                            @endif
						</div>
						<div class="card-footer">
							<div class="input-group">

                                <form class="input-group" action="/startGroupChat" method="POST">
                                @csrf
                                @if($userId !=null && $rideId!=null)
								<input name="message"class="form-control type_msg" placeholder="Type your message..."></input>
								<div class="input-group-append">

                                <input type="hidden" name="receiver_id" value={{ $userId }}>
                                <input type="hidden" name="ride_id" value={{ $rideId }}>

                                <button class="input-group-text send_btn" type="submit">send</button>
                                 @endif
                                <!-- <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection
