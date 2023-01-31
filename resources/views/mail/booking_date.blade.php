{{$booking->guest_name}}さま

いつもRESEをご利用いただき、誠にありがとうございます。

本日はレストランのご予約日です。
ご予約内容は下記の通りでございます。

店名 : {{$booking->shop_name}}
日時 : {{$booking->getStart()}}
人数 : {{$booking->number}}名
コース : {{$booking->course_name}}

どうぞお気をつけてお越しくださいませ。