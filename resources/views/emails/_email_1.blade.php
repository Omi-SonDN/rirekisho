@if($type==0)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi đã nhận được hồ sơ của bạn. Hiện tại hồ sơ của bạn đang trong quá trình chờ duyệt.</br>
Chúng tôi sẽ xem xét và phản hồi cho bạn sớm nhất. Cảm ơn bạn đã quan tâm và gửi hồ sơ đến cho chúng tôi.
<br/>
Trân trọng!
@endif
@if($type==1)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi đã nhận được hồ sơ của bạn, công ty chúng tôi muốn mời bạn đến tham dự phỏng vấn tại công ty.
<br/>
Bạn {{$cv->First_name}} vui lòng phản hồi lại email này để xác nhận tham gia buổi phỏng vấn.<br/>
<br/>  
Trân trọng!
@endif
@if($type==2)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi thực sự đánh giá cao trình độ cũng như sự hiểu biết của bạn đối với vị trí công ty đang tuyển dụng, công ty chúng tôi muốn mời bạn đến tham dự phỏng vấn tại công ty<br/>
<br/>
<span style="font-weight:bold; font-size:16px;">- Thời gian: {{$time}} phút, ngày {{date('d/m/Y',strtotime($date))}}.</span><br/>
<span style="font-weight:bold; font-size:16px;">- Địa điểm: {{$address}}</span><br/>
<br/>
Bạn {{$cv->First_name}} vui lòng phản hồi lại email này để xác nhận tham gia buổi phỏng vấn.<br/>
Trong trường hợp bạn không thể thu xếp được thời gian, xin vui lòng liên hệ lại theo địa chỉ email này hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để thông báo.<br/>
Link địa chỉ công ty: <a href="https://www.google.com/maps/place/Ominext+JSC/@21.0319413,105.7968358,17z/data=!4m8!1m2!2m1!1zT21pbmV4dCBKU0MsIENUTSBCdWlsZGluZywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFF1YW4gSG9hIEPhuqd1IEdp4bqleSBIw6AgTuG7mWksIFZpZXRuYW0!3m4!1s0x3135ab4b46f1e135:0xf01e914e0812a378!8m2!3d21.0320023!4d105.7990381">Ominext Google Map</a>
<br/>
Rất mong bạn {{$cv->First_name}} có thể thu xếp thời gian tham gia phỏng vấn.<br/>
<br/>
Trân trọng, kính mời!
@endif
@if($type==3)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi thông báo rằng bạn chưa vượt qua bài test của chúng tôi! Cảm ơn bạn đã quan tâm đến thông tin tuyển dụng của chúng tôi!<br/>
<br/>
Trân trọng!
@endif
@if($type==9)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi đã nhận được phản hồi đồng ý làm bài test của bạn, công ty chúng tôi thông báo lịch làm bài test của bạn {{$cv->First_name}} như sau: <br/>
<span style="font-weight:bold; font-size:16px;">- Thời gian: {{$time}} phút, ngày {{date('d/m/Y',strtotime($date))}}.</span><br/>
<span style="font-weight:bold; font-size:16px;">- Địa điểm: {{$address}}</span><br/>
Bạn {{$cv->First_name}} vui lòng phản hồi lại email này để xác nhận tham gia làm bài test tại công ty.<br/>
<br/>
Trong trường hợp bạn không thể thu xếp được thời gian, xin vui lòng liên hệ lại theo địa chỉ email này hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để thông báo.<br/>
<br/>
Rất mong bạn {{$cv->First_name}} có thể thu xếp thời gian và đến đúng giờ.<br/>
<br/>
Trân trọng!
@endif
@if($type==12)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chân thành cảm ơn bạn đã đến tham gia buổi phỏng vấn tại công ty.<br/>
Công ty đánh giá cao khả năng của bạn và muốn mời bạn {{$cv->First_name}} về làm việc tại công ty tại vị trí <span style="font-weight:bold; font-size:16px;">{{ $cv->position->name }}.</span><br/>
Thời gian: <span style="font-weight:bold; font-size:16px;">{{$time}} phút, ngày {{date('d/m/Y',strtotime($date))}}.</span><br/>
Địa điểm: <span style="font-weight:bold; font-size:16px;">{{$address}}</span><br/>
Bạn {{$cv->First_name}} có thể chủ động sắp xếp thời gian hợp lý để bắt đầu làm việc<br/>

Khi đến làm việc {{$cv->First_name}} vui lòng mang theo laptop cá nhân<br/>

Hẹn gặp lại {{$cv->First_name}} vào buổi làm việc tới.<br/>

Trân trọng,
@endif
@if($type==26)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chân thành cảm ơn bạn đã gửi hồ sơ cho công ty chúng tôi.<br/>
Công ty muốn mời bạn {{$cv->First_name}} đến công ty làm bài test năng lực.<br/>
Thời gian làm việc: Bắt đầu vào <span style="font-weight:bold; font-size:16px;">{{$time}} phút, ngày {{date('d/m/Y',strtotime($date))}}.</span><br/>
Địa điểm: <span style="font-weight:bold; font-size:16px;">{{$address}}</span><br/>

Khi đến làm việc {{$cv->First_name}} vui lòng mang theo laptop cá nhân<br/>

Hẹn gặp lại {{$cv->First_name}} vào ngày tới.<br/>

Trân trọng,
@endif
@if($type==29)
Chào bạn {{$cv->First_name}}!<br/>
<br/>
Công ty cổ phần Ominext chúng tôi mời bạn đến tham dự phỏng vấn lần 2 tại công ty<br/>
<br/>
<span style="font-weight:bold; font-size:16px;">- Thời gian: {{$time}} phút, ngày {{date('d/m/Y',strtotime($date))}}.</span><br/>
<span style="font-weight:bold; font-size:16px;">- Địa điểm: {{$address}}</span><br/>
<br/>
Bạn {{$cv->First_name}} vui lòng phản hồi lại email này để xác nhận tham gia buổi phỏng vấn.<br/>
Trong trường hợp bạn không thể thu xếp được thời gian, xin vui lòng liên hệ lại theo địa chỉ email này hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để thông báo.<br/>
Link địa chỉ công ty: <a href="https://www.google.com/maps/place/Ominext+JSC/@21.0319413,105.7968358,17z/data=!4m8!1m2!2m1!1zT21pbmV4dCBKU0MsIENUTSBCdWlsZGluZywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFF1YW4gSG9hIEPhuqd1IEdp4bqleSBIw6AgTuG7mWksIFZpZXRuYW0!3m4!1s0x3135ab4b46f1e135:0xf01e914e0812a378!8m2!3d21.0320023!4d105.7990381">Ominext Google Map</a>
<br/>
Rất mong bạn {{$cv->First_name}} có thể thu xếp thời gian tham gia phỏng vấn.<br/>
<br/>
Trân trọng, kính mời!
@endif