<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Notification;
use Mail;
class chatController extends Controller
{
    //
    public function getChats()
    {
        return view('admin.Chats.chat');
    }
    public function postChatMessage($id)
    {

    }
    public function getAllChatsOfLoggedInUser()
    {
        $sender_Id=Auth::user()->id;
        //$messages= Chat::whereIn('receiver_id',[$userId,$sender_Id])->get();
       // $user= User::where('id',$userId)->first();
      // return $sender_Id;
      $type="p";
        $allChatsFromSender= Chat::where([['sender_id',$sender_Id],['chat_type',$type]])->get()->toArray();
       // return $allChatsFromSender;
        // $allChatsFromReceiver= Chat::where('receiver_id',$sender_Id)->get()->toArray();
        // $allchats=array();
        // $allchats=array_merge($allChatsFromSender,$allChatsFromReceiver);

       // return $allchats;
        $allReciverIds=array();
        foreach($allChatsFromSender as $chats)
        {
           $allReciverIds[]=$chats['receiver_id'];
        }
        $allReciversUniqueIds=array_unique($allReciverIds);
        $allUsers=User::select('id', 'name')->whereIn('id', $allReciversUniqueIds)->get();
        //return $allUsers;
        if($allUsers)
        {
           // return $allUsers;
            return view('admin.Chats.chat',["messages"=>null,"user"=>null,"users"=>$allUsers,"userId"=>null,"rideId"=>null]);
        }
        else
        {
               return view('admin.Chats.chat');
        }
    }
    function getGroupChatView()
    {
        return view('admin.Chats.groupChat',["messages"=>null,"user"=>null,"userId"=>null,"rideId"=>null]);
    }
    public function getChatWithId($id)
    {
        $myid=Auth::user()->id;
        $type="p";
        $messages= Chat::whereIn('receiver_id',[$id,$myid])->where('chat_type',$type)->get();
        $rideId= Chat::select('ride_id')->where('receiver_id',$id)->get();
        $user= User::where('id',$id)->first();
        $sender_Id=Auth::user()->id;
        $allChatsFromSender= Chat::where('sender_id',$sender_Id)->get();
        $allReciverIds=array();
        foreach($allChatsFromSender as $chats)
        {
           $allReciverIds[]=$chats->receiver_id;
        }
        array_push($allReciverIds,$id);
        $allReciversUniqueIds=array_unique($allReciverIds);
        $allUsers=User::select('id', 'name')->whereIn('id', $allReciversUniqueIds)->get();
        if(($messages || $allUsers ) && count($rideId)===0)
        {
             return view('admin.Chats.chat',["messages"=>$messages,"user"=>$user,"users"=>$allUsers,"userId"=>$id,"rideId"=>null]);

        }
        else if(( $messages || $allUsers ) && count($rideId)!==0)
        {
            return view('admin.Chats.chat',["messages"=>$messages,"user"=>$user,"users"=>$allUsers,"userId"=>$id,"rideId"=>$rideId[0]['ride_id']]);
        }
        else
        {
        return view('admin.Chats.chat');
        }
    }
    public function chatWithANewUserAndExistingUser($rideId,$userId)
    {
        $sender_Id=Auth::user()->id;
        $type="p";
        $messages= Chat::whereIn('receiver_id',[$userId,$sender_Id])->where('chat_type',$type)->get();
        $user= User::where('id',$userId)->first();
        $allChatsFromSender= Chat::where('sender_id',$sender_Id)->get();
        $allReciverIds=array();
        foreach($allChatsFromSender as $chats)
        {
           $allReciverIds[]=$chats->receiver_id;
        }
        array_push($allReciverIds,$userId);
        $allReciversUniqueIds=array_unique($allReciverIds);
        $allUsers=User::select('id', 'name')->whereIn('id', $allReciversUniqueIds)->get();
       // return $messages;
        if($messages || $allUsers)
        {
            return view('admin.Chats.chat',["messages"=>$messages,"user"=>$user,"users"=>$allUsers,"userId"=>$userId,"rideId"=>$rideId]);
        }
        else
        {
        return view('admin.Chats.chat');
        }
    }
     public function groupChatWithANewUserAndExistingUser($rideId,$userId)
    {
        $sender_Id=Auth::user()->id;
        $type="group";
        $messages= Chat::where([['ride_id',$rideId],['chat_type',$type]])->get();
         $user= User::where('id',$userId)->first();
      //  return $messages;
        if($messages)
        {
            return view('admin.Chats.groupChat',["messages"=>$messages,"user"=>$user,"userId"=>$userId,"rideId"=>$rideId]);
        }
        else
        {
        return view('admin.Chats.groupChat');
        }
    }
    public function getAllNotifications()
    {
        $notifications=Notification::all();
        return view('admin/Notifications/show',["notifications"=>$notifications]);
    }
     public function changeNotificationStatusOfLoggedInUser($notification_id,$user_id)
    {
        // $notification=Notification::where('id',$notification_id)->get();
        // if($notification->isNotEmpty())
        // {

        // }
        // else{

        // }
        return view('admin/Notifications/show');
    }
    public function addMessage(Request $req)
    {
        $userId=$req->receiver_id;
        $sender_Id=Auth::user()->id;
        $obj = new Chat;

        $obj->message = $req->message;
        $obj->sender_id = $sender_Id;
        $obj->receiver_id = $userId;
        $obj->ride_id = $req->ride_id;
        $obj->chat_type="p";
        $obj->status =0;
        $obj->save();

        //After sending message to user we will also send a notification
        //if notification_status of user is 1 then notification will be sent
        $obj1 = User::where([['id',$sender_Id],['notification_status','=',1]])->get();
        if(count($obj1)>0)
        {
         $noti=$obj1[0]->notification_status;
         //return $noti;
            if($noti == 1)
            {
            $notification=new Notification;
            $notification->title="You receive a new message";
            $notification->message=$req->message;
            $notification->user_id=$userId;
            $notification->ride_id=$req->ride_id;
            $notification->type="chat";
            $notification->save();

            $reciever_user=User::where('id',$userId)->first();
            $sender_user=User::where('id',$sender_Id)->first();

             $data = [
                'sender_first_name' => $sender_user->first_name,
                'sender_last_name' => $sender_user->last_name,

            ];
            $emaildata = array('to' => $reciever_user->email, 'to_name' =>$reciever_user->first_name);
            Mail::send('email_template', $data, function($message) use ($emaildata)
             {
                $message->to($emaildata['to'], $emaildata['to_name'])
                        ->from('SplitRideMY@gmail.com', 'Split Rider')
                        ->subject('New Message Notification');
            });
            }
        }

        $sender_Id=Auth::user()->id;
        $messages= Chat::whereIn('receiver_id',[$userId,$sender_Id])->get();
        $rideId= Chat::select('ride_id')->where('receiver_id',$userId)->get();
        $user= User::where('id',$userId)->first();
        $allChatsFromSender= Chat::where('sender_id',$sender_Id)->get();
        $allReciverIds=array();
        foreach($allChatsFromSender as $chats)
        {
           $allReciverIds[]=$chats->receiver_id;
        }
        array_push($allReciverIds,$userId);
        $allReciversUniqueIds=array_unique($allReciverIds);
        $allUsers=User::select('id', 'name')->whereIn('id', $allReciversUniqueIds)->get();

        if($messages || $allUsers)
        {
            return view('admin.Chats.chat',["messages"=>$messages,"users"=>$allUsers,"userId"=>$userId,"rideId"=>$req->ride_id]);
        }
        else
        {
        return view('admin.Chats.chat');
        }
    }
      public function addGroupMessage(Request $req)
    {
        $userId=$req->receiver_id;
        $sender_Id=Auth::user()->id;
        $obj = new Chat;
        $obj->message = $req->message;
        $obj->sender_id = $sender_Id;
        $obj->receiver_id = $userId;
        $obj->ride_id = $req->ride_id;
        $obj->chat_type="group";
        $obj->status =0;
        $obj->save();

        //After sending message to user we will also send a notification
        //if notification_status of user is 1 then notification will be sent
        $obj1 = User::where([['id',$sender_Id],['notification_status','=',1]])->get();
        if(count($obj1)>0)
        {
         $noti=$obj1[0]->notification_status;
         //return $noti;
            if($noti == 1)
            {
            $notification=new Notification;
            $notification->title="You receive a new message";
            $notification->message=$req->message;
            $notification->user_id=$userId;
            $notification->ride_id=$req->ride_id;
            $notification->type="chat";
            $notification->save();

            $reciever_user=User::where('id',$userId)->first();
            $sender_user=User::where('id',$sender_Id)->first();

             $data = [
                'sender_first_name' => $sender_user->first_name,
                'sender_last_name' => $sender_user->last_name,

            ];
            $emaildata = array('to' => $reciever_user->email, 'to_name' =>$reciever_user->first_name);
            Mail::send('email_template', $data, function($message) use ($emaildata)
             {
                $message->to($emaildata['to'], $emaildata['to_name'])
                        ->from('SplitRideMY@gmail.com', 'Split Rider')
                        ->subject('New Message Notification');
            });
            }
        }

        $rideId=$req->ride_id;
        $sender_Id=Auth::user()->id;
        $messages= Chat::where('ride_id',$rideId)->get();
         $user= User::where('id',$userId)->first();
        if($messages)
        {
            return view('admin.Chats.groupChat',["messages"=>$messages,"user"=>$user,"userId"=>$userId,"rideId"=>$rideId]);
        }
        else
        {
        return view('admin.Chats.groupChat');
        }
    }
    function deleteNotification($id)
    {
        $obj=Notification::find($id);
        $obj->delete();
       // $notifications=Notification::all();
        return redirect('/allNotifications');
    }
    function showProfile()
    {
        $user = User::where('id',Auth::user()->id)->get();
       // return $user;
        return view('admin/Profile/show',["user"=>$user]);
    }
       function editProfile(Request $req)
    {
          $userId=Auth::user()->id;
          $obj = User::find($userId);
          if($obj)
          {
            $obj->name = $req->name;
            $obj->email=$req->email;
            $password=$req->password;
            if($password != "")
            {
                $obj->password=bcrypt($req->password);
            }
            if ($req->has('image'))
            {
              //  return "image selected";
            //unlink(public_path($blog->image));
            $file=$req->file('image');
            $extension=$file->getClientOriginalExtension();
            $file_name = time().'.'. $extension;
            $image_path = 'frontend_assets/profileImages/';
            $file->move($image_path, $file_name);
        //    Image::make($req->image)->resize(320, 240)->save(public_path($image_path));
            $obj->photo = $file_name;
            }
            $obj->save();
            return redirect('/showProfile');

          }
    }
    function editUser($id)
    {
       $obj = User::find($id);
       return view('admin/Users/edit',["user"=>$obj]);
    }
    function updateUser(Request $req)
    {
          $id=$req->id;
          $obj = User::find($id);
          if($obj)
          {
            $obj->name = $req->name;
            $obj->email=$req->email;
            $password=$req->password;
            if($password != "")
            {
                $obj->password=bcrypt($req->password);
            }

            $obj->save();
            return redirect('/allUsers');

          }
    }


    //Map
    function showMap()
    {
        return view('map');
    }
}
