<header>
	<div class="row">
		<div class="logo col-4"> 
			<h1>QuizBitz</h1>
		</div>
		<div class="timer col-8">
			<div class="timer_body row">
				<div>
					<ul>
						<li><h3 id="hr10_v">0</h3></li>
						<li><h3 id="hr10_i">0</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3 id="hr_v">0</h3></li>
						<li><h3 id="hr_i">0</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3>:</h3></li>
						<li><h3>:</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3 id="min10_v">0</h3></li>
						<li><h3 id="min10_i">0</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3 id="min_v">0</h3></li>
						<li><h3 id="min_i">0</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3>:</h3></li>
						<li><h3>:</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3 id="sec10_v">0</h3></li>
						<li><h3 id="sec10_i">0</h3></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><h3 id="sec_v">0</h3></li>
						<li><h3 id="sec_i">0</h3></li>
					</ul>
				</div>
			</div>
			<a class="logout" href="<?php echo base_url().'index.php/login/logout'?>">Logout</a>
		</div> 
	</div><!--row-->
</header>
<div class="container">
	<div class="window_box">
		<div class="row window_title">
			<h2 id="qn">Question Number: <?php echo $counter[0];?></h2>
		</div>
		<div class="row que">
			<p id="que">Q: <?php echo $quenop['que'];?></p>
		</div>
		<div class="row options">
			<ul id="op">
				<li><span><input type="radio" name="choice" value="1"></span><span id="op1"><?php echo $quenop['choice1'];?></span></li>
				<li><span><input type="radio" name="choice" value="1"></span><span id="op2"><?php echo $quenop['choice2'];?></span></li>
				<li><span><input type="radio" name="choice" value="1"></span><span id="op3"><?php echo $quenop['choice3'];?></span></li> 
				<li><span><input type="radio" name="choice" value="1"></span><span id="op4"><?php echo $quenop['choice4'];?></span></li>
			</ul>
		</div><!--options-->
		<div class="row response">
			<input type="submit" value="Previous" onclick="pre()">
			<input type="submit" value="Submit">
			<input type="submit" value="Next" onclick="next()">
		</div>
	</div><!--qbox-->
</div><!--container-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.js"></script>
<script>

//quiz questions
<?php echo 'var qna = '.$qna.';';
	echo 'var qkeys = '.$qkeys.';';
?>
var qno = 0;

function pre(){
	if(qno>0){
		qno--;
		document.getElementById("qn").innerHTML = "Question Number: "+(qno+1);
		document.getElementById("que").innerHTML = "Q: "+ qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[0]]; 
		document.getElementById("op1").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[1]];
		document.getElementById("op2").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[2]];
		document.getElementById("op3").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[3]];
		document.getElementById("op4").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[4]];
	}
}

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

function next() {
	var size = Object.size(qna);
	
	if(qno<size-1){
		qno++;
		document.getElementById("qn").innerHTML = "Question Number: "+(qno+1);
		document.getElementById("que").innerHTML = "Q: "+ qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[0]]; 
		document.getElementById("op1").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[1]];
		document.getElementById("op2").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[2]];
		document.getElementById("op3").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[3]];
		document.getElementById("op4").innerHTML = qna[qkeys[qno]][Object.keys(qna[qkeys[qno]])[4]];
	}
}

//timer code
<?php
	echo 'var hr = '.$timer['hr'].';';
	echo 'var min = '.$timer['min'].';';
	echo 'var sec = '.$timer['sec'].';';
?>
var h10 = Math.floor(hr/10);
var h = hr%10;
var m10 = Math.floor(min/10);
var m = min%10;
var s10 = Math.floor(sec/10);
var s = sec%10;

var tm = setInterval(updateTime,1000);	

(function timersetup(){
	setTime();
})();

function updateTime(){	
	if(sec == 0){
		sec = 59;
		if(min == 0){
			min = 59;
			if(hr == 0){
				rmClass();
				setTime();
				alert("Time up!");
				clearInterval(tm);
				sec = 0;
				min = 0;
			}
			else{
				hr--;
			}
		}
		else{
			min--;
		}
	}
	else{
		sec--;
	}
	rmClass();
	setTime();
	updateDigits();
}

function updateDigits() {
	if(h10 != Math.floor(hr/10)){
		h10 = Math.floor(hr/10);
		moveDigit("hr10");
	}
	if(h != (hr%10)){
		h = (hr%10);
		moveDigit("hr");
	}
	
	if(m10 != Math.floor(min/10)){
		m10 = Math.floor(min/10);
		moveDigit("min10");
	}
	if(m != (min%10)){
		m = (min%10);
		moveDigit("min");
	}
	
	if(s10 != Math.floor(sec/10)){
		s10 = Math.floor(sec/10);
		moveDigit("sec10");
	}
	if(s != (sec%10)){
		s = (sec%10);
		moveDigit("sec");
	}
}

function setTime(){
	
	changeDigit("hr10_v",h10);
	changeDigit("hr10_i",decrement(h10,true));
	changeDigit("hr_v",h);
	changeDigit("hr_i",decrement(h,false));
		
	changeDigit("min10_v",m10);
	changeDigit("min10_i",decrement(m10,true));
	changeDigit("min_v",m);
	changeDigit("min_i",decrement(m,false));
	
	changeDigit("sec10_v",s10);
	changeDigit("sec10_i",decrement(s10,true));
	changeDigit("sec_v",s);
	changeDigit("sec_i",decrement(s,false));
}

function decrement(digit,toggle){
	if(digit == 0 )
		if(toggle)
			return 5;
		else
			return 9;
	else
		return --digit;
}

function changeDigit(id,val){
	document.getElementById(id).innerHTML = val;
}

function moveDigit(id){
	$("#"+id+"_v").addClass("moveup_ud");
	$("#"+id+"_i").css("display","block").addClass("moveup_ld");
}

function rmClass(){
	document.getElementById("hr10_v").className = "";
	document.getElementById("hr10_i").className = "";
	
	document.getElementById("hr_v").className = "";
	document.getElementById("hr_i").className = "";
	
	document.getElementById("min10_v").className = "";
	document.getElementById("min10_i").className = "";
	
	document.getElementById("min_v").className = "";
	document.getElementById("min_i").className = "";
	
	document.getElementById("sec10_v").className = "";
	document.getElementById("sec10_i").className = "";
	
	document.getElementById("sec_v").className = "";
	document.getElementById("sec_i").className = "";
}
</script>