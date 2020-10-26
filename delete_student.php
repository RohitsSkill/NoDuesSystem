
<?php
	session_start();
if($_SESSION["username"]==null)
die;

?>
<html>
<title>no_dues</title>
<head>

<style>
  :host {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 14px;
    color: #333;
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin: 8px 0;
  }

  p {
    margin: 0;
  }

  .spacer {
    flex: 1;
  }

  .toolbar {
    height: 160px;
    margin: -8px;
    display: flex;
    align-items: center;
    background-color:white;
    color: black;
    font-weight: 600;
  }

  .toolbar img {
    margin: 0 16px;
  }

  .toolbar #twitter-logo {
    height: 40px;
    margin: 0 16px;
  }

  .toolbar #twitter-logo:hover {
    opacity: 0.8;
  }

  .content {
    display: flex;
    margin: 32px auto;
    padding: 0 16px;
    max-width: 960px;
    flex-direction: column;
    align-items: center;
  }

  svg.material-icons {
    height: 24px;
    width: auto;
  }

  svg.material-icons:not(:last-child) {
    margin-right: 8px;
  }

  .card svg.material-icons path {
    fill: #888;
  }

  .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 16px;
  }

  .card-container1 {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items:center;
    margin-top: 16px;
  }

  .card {
    border-radius: 4px;
    border: 1px solid #eee;
    background-color: #fafafa;
    height: 40px;
    width: 200px;
    margin: 0 8px 16px;
    padding: 16px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
    line-height: 24px;
  }

  .card1 {
    border-radius: 4px;
    border: 1px solid #eee;
    background-color: #fafafa;
    height: 170px;
    width: 500px;
    margin: 0px;
    padding: 16px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
    line-height: 24px;
  }
  
.card2 {
    border-radius: 4px;
    border: 1px solid #eee;
    background-color: #fafafa;
    height: 10px;
    width: 400px;
    margin: 0px;
    padding: 16px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
    line-height: 24px;
  }

  .card-container .card:not(:last-child) {
    margin-right: 0;
  }

  .card.card-small {
    height: 16px;
    width: 168px;
  }

  .card-container .card:not(.highlight-card) {
    cursor: pointer;
  }

  .card-container .card:not(.highlight-card):hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 17px rgba(black, 0.35);
  }

  .card-container .card:not(.highlight-card):hover .material-icons path {
    fill: rgb(105, 103, 103);
  }

  .card.highlight-card {
    background-color: #1976d2;
    color: white;
    font-weight: 600;
    border: none;
    width: auto;
    min-width: 30%;
    position: relative;
  }

  .card.card.highlight-card span {
    margin-left: 60px;
  }

  svg#rocket {
    width: 80px;
    position: absolute;
    left: -10px;
    top: -24px;
  }

  svg#rocket-smoke {
    height: 100vh;
    position: absolute;
    top: 10px;
    right: 180px;
    z-index: -10;
  }

  a,
  a:visited,
  a:hover {
    color: #1976d2;
    text-decoration: none;
  }


  a:hover {
    color: #125699;
  }
  .terminal {
    position: relative;
    width: 80%;
    max-width: 600px;
    border-radius: 6px;
    padding-top: 45px;
    margin-top: 8px;
    overflow: hidden;
    background-color: rgb(15, 15, 16);
  }

  .terminal::before {
    content: "\2022 \2022 \2022";
    position: absolute;
    top: 0;
    left: 0;
    height: 4px;
    background: rgb(58, 58, 58);
    color: #c2c3c4;
    width: 100%;
    font-size: 2rem;
    line-height: 0;
    padding: 14px 0;
    text-indent: 4px;
  }

  .terminal pre {
    font-family: SFMono-Regular,Consolas,Liberation Mono,Menlo,monospace;
    color: white;
    padding: 0 1rem 1rem;
    margin: 0;
  }

  .circle-link {
    height: 40px;
    width: 40px;
    border-radius: 40px;
    margin: 8px;
    background-color: white;
    border: 1px solid #eeeeee;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    transition: 1s ease-out;
  }

  .circle-link:hover {
    transform: translateY(-0.25rem);
    box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);
  }

  footer {
    margin-top: 8px;
    display: flex;
    align-items: center;
    line-height: 20px;
  }

  footer a {
    display: flex;
    align-items: center;
  }

  .github-star-badge {
    color: #24292e;
    display: flex;
    align-items: center;
    font-size: 12px;
    padding: 3px 10px;
    border: 1px solid rgba(27,31,35,.2);
    border-radius: 3px;
    background-image: linear-gradient(-180deg,#fafbfc,#eff3f6 90%);
    margin-left: 4px;
    font-weight: 600;
    font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
  }

  .github-star-badge:hover {
    background-image: linear-gradient(-180deg,#f0f3f6,#e6ebf1 90%);
    border-color: rgba(27,31,35,.35);
    background-position: -.5em;
  }

  .github-star-badge .material-icons {
    height: 16px;
    width: 16px;
    margin-right: 4px;
  }

  svg#clouds {
    position: fixed;
    bottom: -160px;
    left: -230px;
    z-index: -10;
    width: 1920px;
  }
  .box_t{
			height:150px;
			width:100%;
			background:url('modern/img/bg-header.png');
			color:white;
			text-align: center;
		}
    .box_m{
			height:400px;
			width:100%;
			background:url('modern/img/bg-begin-repeat.jpg');
			color:white;
			align-items: center;		
			text-align: center;
		}
		.box_b{
			height:100px;
			width:100%;
			background:url('modern/img/bg-header.png');
			color:white;
			text-align: center;
		}

    .bton{
      height:30px;
			width:100px;
			background:url('modern/img/bg-title-dark.png');
			color:white;
    	text-align: center;
    }

    .bton1{
      height:40px;
			width:100px;
			background:url('modern/img/bg-title-dark.png');
			color:white;
    	text-align: center;
    }
  /* Responsive Styles */
  @media screen and (max-width: 767px) {

    .card-container > *:not(.circle-link) ,
    .terminal {
      width: 100%;
    }

    .card:not(.highlight-card) {
      height: 16px;
      margin: 8px 0;
    }

    .card.highlight-card span {
      margin-left: 72px;
    }

    svg#rocket-smoke {
      right: 120px;
      transform: rotate(-5deg);
    }
  }

  @media screen and (max-width: 575px) {
    svg#rocket-smoke {
      display: none;
      visibility: hidden;
    }
  }
</style>
</head>
<body>
<div class='box_t'>
  <!--div class="card highlight-card card-small"-->
  <span><h2>***************************************************************************************</h2></span>
  <span><h3>JAWAHAR EDUCATION SOCIETY'S </h3></span>
  <span><h1>INSTITUTE OF TECHNOLOGY MANAGEMENT AND RESEARCH, NASHIK.</h1></span>
  <!--/div-->
</div>
<div class="content box_m" role="main">

    <span><h2>NO DUES APPLICATION</h2></span>
  <h2>STUDENT HOME PAGE</h2>
  
  <table>
  <tr>
  <form action="delete_student.php" method='POST'>
  <td>
  <button class='bton'>
  
  <a class='bton'>Delete profile</a>
  </button>
  </td>
  </form>

  <td>
  <br>
  </td>

  <form action="student_home.php" method='POST'>
  <td>
  <button class='bton'>
  <p name='username' value=></p>
  <a class='bton' name='username'>Status
  </a>
  </button>
	</td>
  </form>
  </tr>
  </table>			          
       
  <h3>This option is provided for changing your academic data if you click a delete button it will delete your all data from database which will never get back </h3>
  <h3>SO SELECT THIS OPTION WHEN YOUR SEMESTER IS COMPLETED.!!</h3>
  <form action="delete_profile.php" method='POST'>
  <button class='bton1'>
  <a class='bton1'>Delete Anyway</a>
  </button>
  </form>
  
  <a href="get_destroy.php">log out</a>
</div>

<div class='box_t'>
    <span><h2>*</h2></span>
  <span><h2>HERE IS QUALITY EDUCATION</h2></span>
  <span><h2>************************************************************************</h2></span>
  </div>

<router-outlet></router-outlet>
</html>