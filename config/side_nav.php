<div class="w3-sidebar w3-bar-block w3-light-grey w3-card-2" style="width:13%;padding-top:55px">
<a href="index.php" class="w3-bar-item w3-button <?php if($page=="index"){echo "w3-gray";}?>"><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Dashboard</a>
<button class="w3-button w3-block w3-left-align" onclick="myAccFunc2()">
    <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Book <i class="fa fa-caret-down"></i>
</button>
<div id="demoAcc2" class="w3-hide w3-white w3-card-2">
    <a href="Book_category.php" class="w3-bar-item w3-button">&nbsp;&nbsp;<i class="fa fa-list" aria-hidden="true"></i> &nbsp;Book Category</a>
    <a href="Books.php" class="w3-bar-item w3-button">&nbsp;&nbsp;<i class="fa fa-book" aria-hidden="true"></i> &nbsp;Book</a>
</div>


<button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
    <i class="fa fa-user" aria-hidden="true"></i> &nbsp;Member <i class="fa fa-caret-down"></i>
</button>
<div id="demoAcc" class="w3-hide w3-white w3-card-2">
    <a href="Lectures.php" class="w3-bar-item w3-button">&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i> &nbsp;Lecturer</a>
    <a href="Students.php" class="w3-bar-item w3-button">&nbsp;&nbsp;<i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp;Student</a>
</div>



<a href="Users.php" class="w3-bar-item w3-button <?php if($page=="users"){echo "w3-gray";}?>" style="
<?php if($usertype!="Admin"){ echo "display:none";} ?>"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Users</a>
<a href="Faculty.php" class="w3-bar-item w3-button <?php if($page=="faculty"){echo "w3-gray";}?>"><i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp; Faculty</a>
<a href="Degree.php" class="w3-bar-item w3-button <?php if($page=="deg"){echo "w3-gray";}?>" ><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp; Degree</a>
<a href="Request_from_members.php" class="w3-bar-item w3-button <?php if($page=="req1"){echo "w3-gray";}?>" ><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; Requested books</a>
<a href="Request_a_Book.php" class="w3-bar-item w3-button <?php if($page=="req2"){echo "w3-gray";}?>" ><i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; Request</a>
<a href="Fine_report.php" class="w3-bar-item w3-button <?php if($page=="Fine"){echo "w3-gray";}?>" ><i class="fa fa-money" aria-hidden="true"></i> &nbsp; Fine Report</a>
<a href="Loged_details.php" class="w3-bar-item w3-button <?php if($page=="log"){echo "w3-gray";}?>" style="
<?php if($usertype!="Admin"){ echo "display:none";} ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Loged Details</a>
<a href="All_notifications.php" class="w3-bar-item w3-button <?php if($page=="notification"){echo "w3-gray";}?>" ><i class="fa fa-bell-o" aria-hidden="true"></i> &nbsp; Notifications</a>
<button class="w3-button w3-block w3-left-align" onclick="myAccFunc3()">
    <i class="fa fa-retweet" aria-hidden="true"></i> &nbsp;Circulation <i class="fa fa-caret-down"></i>
</button>
<div id="demoAcc3" class="w3-hide w3-white w3-card-2">
<a href="config_circulation.php" class="w3-bar-item w3-button <?php if($page=="lendingCat"){echo "w3-gray";}?>" >&nbsp;&nbsp;<i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Circulation Settings</a>
<a href="Circulation.php" class="w3-bar-item w3-button <?php if($page=="Circulation"){echo "w3-gray";}?>" >&nbsp;&nbsp;<i class="fa fa-retweet" aria-hidden="true"></i>&nbsp; Circulation</a>
<a href="Issue_Book.php" class="w3-bar-item w3-button <?php if($page=="issue"){echo "w3-gray";}?>">&nbsp;&nbsp;<i class="fa fa-share" aria-hidden="true"></i>&nbsp; Issuee</a>
<a href="Issue_online_resived_book.php" class="w3-bar-item w3-button <?php if($page=="online"){echo "w3-gray";}?>">&nbsp;&nbsp;<i class="fa fa-laptop" aria-hidden="true"></i>&nbsp; Online Issue</a>
<a href="Return.php" class="w3-bar-item w3-button <?php if($page=="return"){echo "w3-gray";}?>">&nbsp;&nbsp;<i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Return</a>
</div>

</div>