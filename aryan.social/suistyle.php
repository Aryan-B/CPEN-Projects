<?php
header('Content-type:text/css;charset: UTF-8');
?>

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;

}


.box{
	font-family: 'Lexend Deca', sans-serif;
	font-size: 1.7vh;
	border-radius: 1px;
	height:5%;
	width:100%;
    position:relative;
display:flex;
align-items:center;
justify-content:center;
grid-column:1/span2;
}

.container{
	position: relative;
	background-image: linear-gradient(-225deg, #2CD8D5 0%, #6B8DD6 48%, #8E37D7 100%);;
	width: 700px;
	height: 80vh;
	border-width: 0px;


	padding:10px 40px 10px 50px;
	font-size: 2vh;
	display: grid;
	grid-template-columns: auto auto;
	grid-gap: 0px;


	align-items: center;

}

.page{
position:absolute;
	width: 100vw;
	height: 100vh;
	background-image: url(./images/cw.png);
	background-repeat: all;
	background-size: auto;
    display:flex;
	align-items: center;
      justify-content: center;
}


.box1{
    position:relative;
  width:150px;
  box-sizing: border-box;
  border: none;
  outline:none;
  border-bottom: 2px solid white;

color:white;
  border-radius: 4px;
  font-size: 1.5vh;
  background-color: transparent;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 20px;
  transition: width 0.4s ease-in-out;
margin-left:5vw;
   display:flex;
	align-items: center;
      justify-content: center;
          grid-column: 1;

}	
.box1:focus {
    outline:none;
  width: 200px;
}

.box1::placeholder {
  color: white;
  font-family: 'Lexend Deca', sans-serif;
  font-size: 1.5vh;
}


.submit{
    margin:auto;
    width:50%;
    height:8vh;
    font-family: 'Lexend Deca', sans-serif;
	font-size: 2vh;
    position:relative;

	background-color:rgba(0, 0, 0, 0.3);
border:2px solid white;
	color: white;
	border-radius: 3px;
grid-column:1/3;

}

.close{

    position:absolute;

    z-index:0;

    cursor:pointer;
    border:none;
    width:6vh;
    height:6vh;
	background: url("./images/logo-cross.png") no-repeat;
background-size: contain;
border-radius:50%;
border:1px solid white;
grid-column:2/3;
padding:0px 0px 50px 50px;
margin-top:-4vh;
margin-left:-5vh;
}

.error{
    position:absolute;
    color:red;
    font-family: 'Lexend Deca', sans-serif;
	font-size: 3vh;
    margin-top:-45vh;

}

@media only screen and (max-width: 700px){

.container{
    width:100%
}
.box{
    font-size:2.5vh;
}
.box1{
    font-size:2.5vh;
}
.box1::placeholder{
    font-size:2.5vh;
}
}