<h1>Hi!</h1>
 
<p>We'd like to personally welcome you to Tickets Apps. Thank you!</p>

<br><br><br>
<form method="POST" action="http://localhost:8000/invitations/{{ $token }}" accept-charset="UTF-8" id="invitation" novalidate="novalidate">	
	<input name="_method" type="hidden" value="PUT">
	<input name="_token" type="hidden" value="J37U8KKoj2Nq1y25f6kEul7aZlpkprMZbYIrFH1S">
	<input style="display:block;border:0;background:#00a5a6;color:#fbfbfb;border-radius:5px;padding:7px;font-size:20px;text-align:center;width:50%;margin: 0 auto;" class="btn btn-success" id="btn-invitation" type="submit" value="Go to Tickets App">
</form>