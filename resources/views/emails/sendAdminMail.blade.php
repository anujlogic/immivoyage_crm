@component('mail::message')
<center><img src="https://portal.immivoyage.com/public/asset/image/logo.png" alt="AdminLTE Logo" style="width: 220px; height: 139px;"></center>

<h3>The Immivoyage New Lead.</h3><br/>
<b>Leads From:</b> {{ $data['category'] }} <br/>
<b>Name:</b> {{ $data['name'] }} <br/>
<b>Contact No:</b> {{ $data['mobile_no'] }} <br/>
<b>Call Purpose:</b> {{ $data['call_purpose'] }} <br/>
<b>Feed Back:</b> {{ $data['feed_back'] }}<br/>
<b>Manage By:</b> {{ $data['manage_by'] }}

@component('mail::button', ['url' => $data['url']])
Go to Admin Panel
<br/>
@endcomponent
Address: Plot F279, Lower Ground, Vijay Tower,<br/> Industrial Area, Sector 74, <br/>Sahibzada Ajit Singh Nagar,<br/> Punjab 160071
@endcomponent