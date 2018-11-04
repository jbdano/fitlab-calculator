<?php

preg_match("/iPhone|iPad|iPod|webOS/", $_SERVER['HTTP_USER_AGENT'], $matches);
$os = current($matches);

$number_type = ($os) ? 'type="tel"' : 'type="number"';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128600822-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-128600822-1');
        </script>
    
        <meta charset="UTF-8">
        <title>Nightly Numbers Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="theme-color" content="#00a200">
<!--         <link rel="icon" href="Assets/img/favicon3.png">	 -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
    	<link rel="stylesheet" href="Assets/css/custom.css">
    	
    	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>
    <body>
    	<div id="app" v-cloak>
    
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
<!--                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> -->
<!--                     <span class="sr-only">Toggle navigation</span> -->
<!--                     <span class="icon-bar"></span> -->
<!--                     <span class="icon-bar"></span> -->
<!--                     <span class="icon-bar"></span> -->
<!--                   </button> -->
                  <a class="navbar-brand" href="#"><img class="brand-img" src="Assets/img/FITLAB-Fitness-Club-Logo.png"></a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
<!--                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
<!--                   <ul class="nav navbar-nav"> -->
<!--                     <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li> -->
<!--                   </ul> -->
<!--                 </div> -->
              </div>
            </nav>
            
            
            <div class="container">
            	<div class="row">
            	
                    <section class="col-sm-12 col-md-6" id="calcMainSection">
                    	<div class="card">
                    		<header>
<!--                     			<span class="pull-right text-muted" v-cloak v-show="(activePageIndex + 1) < pages.length">{{ activePageIndex + 1 }} / {{ pages.length - 1 }}</span> -->
                    			<h3 class="header-title color-green text-left" v-text="pages[activePageIndex].title"></h3>
                    		</header>
                    		<div class="card-content">
                                <form class="calcForm">
                                    
                                    <div v-if="activePageIndex == 0">
                                        <div class="form-group" id="dateGroup">
                                            <label for="date">Date</label>
                                            <input type="date" v-model="date" class="form-control" id="date">
                                        </div>
                                        <div class="form-group" id="numOfSalesGroup">
                                            <label for="numOfSales">Number of Sales</label>
                                            <input <?php echo $number_type; ?> v-model="numSales" class="form-control" id="numOfSales" min="0">
                                        </div>
                                    </div>
                                    
                                    <div name="fade" v-else-if="activePageIndex == 1">
                                        <div class="form-group" id="shipCashGroup">
                                            <label for="shipCash">Ship Cash</label>
                                            <input <?php echo $number_type; ?> v-model="shipCash" class="form-control" id="shipCash" min="0">
                                        </div>
                                        <div class="form-group" id="clubZGroup">
                                            <label for="clubZ">Club Z</label>
                                            <input <?php echo $number_type; ?> v-model="clubZ" class="form-control" id="clubZ" min="0">
                                        </div>
                                    </div>
                                    
                                    <div v-else-if="activePageIndex == 2" v-cloak>
                                        <div class="form-group" id="salesMTDGroup">
                                            <label for="salesMTD">MTD Sales</label>
                                            <input <?php echo $number_type; ?> v-model="salesMTD" class="form-control" id="salesMTD" min="0">
                                        </div>
                                        <div class="form-group" id="shipCashMTDGroup">
                                            <label for="shipCashMTD">MTD Ship Cash</label>
                                            <input <?php echo $number_type; ?> v-model="shipCashMTD" class="form-control" id="shipCashMTD" min="0">
                                        </div>
                                        <div class="form-group" id="clubZMTDGroup">
                                            <label for="clubZMTD">MTD Club Z</label>
                                            <input <?php echo $number_type; ?> v-model="clubZMTD" class="form-control" id="clubZMTD" min="0">
                                        </div>
                                    </div>
                                    
                                    <div v-else-if="activePageIndex == 3" v-cloak>
                                        <div class="form-group" id="salesGoalGroup">
                                            <label for="salesGoal">Sales Goal</label>
                                            <input <?php echo $number_type; ?> v-model="salesGoal" class="form-control" id="salesGoal" min="0">
                                        </div>
                                        <div class="form-group" id="shipCashGoalGroup">
                                            <label for="shipCashGoal">Ship Cash Goal</label>
                                            <input <?php echo $number_type; ?> v-model="shipCashGoal" class="form-control" id="shipCashGoal" min="0">
                                        </div>
                                        <div class="form-group" id="clubZGoalGroup">
                                            <label for="clubZGoal">Club Z Goal</label>
                                            <input <?php echo $number_type; ?> v-model="clubZGoal" class="form-control" id="clubZGoal" min="0">
                                        </div>
                                    </div>
                                    
                                    <div v-else-if="activePageIndex == 4" v-cloak>
    									<button type="button" id="copyResultsBtn" v-on:click="copyResults" class="btn btn-default pull-right">Copy to Clipboard</button>
    									<textarea readonly rows="12" class="form-control" id="resultsText" spellcheck="false" v-text="resultsText"></textarea>
                                    </div>
                                    
                                </form>
                            </div>
                    		<footer>
                    			<div class="nav-buttons" style="display: block; margin-bottom: 25px;">
                    				<button type="button" v-on:click="prevPage" class="btn btn-default"><i class="fas fa-angle-left"></i> Back</button>
                                    <button type="button" v-on:click="nextPage" v-show="(activePageIndex + 1) < pages.length" class="btn btn-success pull-right">Continue <i class="fas fa-angle-right"></i></button>
                    			</div>
                    			
                    			<div class="progress text-center">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                  aria-valuemin="0" aria-valuemax="100"
                                  v-bind:style="{ width: progressWidth + '%' }"></div>
                                </div>
                    		</footer>
                    	</div>
                    </section>
                    
                    <section class="col-sm-12 col-md-6" id="calcHelpSection" v-show="pages[activePageIndex].help.length > 0">
                    	<div class="card">
                    		<header>
                    			<h3 class="header-title color-black text-center">Help</h3>
                    		</header>
                    		<div class="card-content">
                    			
                    			<div class="help-block" v-for="helper in pages[activePageIndex].help">
                    				<h4>{{ helper.title }}</h4>
                    				<p v-html="helper.message"></p>
                    				<hr>
                    			</div>
                    			
                    		</div>
                    	</div>
                    </section>
            		
            	</div>
            </div>
        
    	</div><!-- #app -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
<script type="text/javascript">

$(document).ready(function() {

    var app = new Vue({
        el: '#app',
        data: {
        	date: '',
        	numSales: 5,
        	shipCash: 401.25,
        	clubZ: 850.75,
        	salesMTD: 4,
        	shipCashMTD: 823.97,
        	clubZMTD: 951.56,
        	salesGoal: 110,
        	shipCashGoal: 11000,
        	clubZGoal: 13000,
        	resultsText: '',
        	progressWidth: 0,
        	activePageIndex: 0,
        	pages: [
				{
					title: 'How many sales were made?',
					help: [
						{
							title: 'Date',
							message: 'The dates in which the numbers for this calculation is being entered for.' 
						},
						{
							title: 'Number of Sales',
							message: "Number of highlighted green rows in the guest log for this date."
						}
					]
				},
				{
					title: 'How much cash was received?',
					help: [
						{
							title: 'Ship Cash',
							message: 'Money taken in today related to memberships.<br> > guest log for today <br> > last row <br> > first number' 
						},
						{
							title: 'Club Z',
							message: 'Total money taken in today (Ted\'s Grand Total on the Z Sheet)'
						}
					]
				},
				{
					title: 'What are the month-to-date totals?',
					help: [
						{
							title: 'Month-To-Date (MTD)',
							message: 'All numbers are found in the guest log for the previous day. For example, if the numbers for this calculation are for today, then the MTD numbers can be found on yesterday\'s guest log page.' 
						}
					]
				},
				{
					title: 'What are the monthly goals?',
					help: [
						{
							title: 'Monthly Goals',
							message: 'Ask your manager' 
						}
					]
				},
				{
					title: 'Results',
					help: []
				}
        	]
        },
        methods: {
            initPage: function() {

            	var today = new Date();
            	var dd = today.getDate();
            	var mm = today.getMonth()+1; //January is 0!
            	var yyyy = today.getFullYear();

            	if (dd < 10) dd = '0'+dd;

            	this.date = yyyy + '-' + mm + '-' + dd;
            },
            nextPage: function() {
                
            	var currIndex = this.activePageIndex;
            	var nextIndex = currIndex + 1;

            	if (this.validatePage(currIndex)) {

    				if (nextIndex in this.pages) {
    					this.activePageIndex = nextIndex;
    				}
    
    				if ((nextIndex + 1) == this.pages.length) {
    					this.calcResults();
    				}
    				$('html, body').animate({scrollTop:0}, 'slow');
    				this.updateProgressBar();
            	}
            },
            prevPage: function() {
                
            	var currIndex = this.activePageIndex;
            	var prevIndex = currIndex - 1;

				if (prevIndex in this.pages) {
					this.activePageIndex = prevIndex;
				}
				$('html, body').animate({scrollTop:0}, 'slow');
				this.updateProgressBar();
            },
            validatePage: function(pageIndex) {

                var valid = true;
				
                if (pageIndex == 0) {

                	// Date
                    if (this.date == '') {
						$('#dateGroup').addClass('has-error');
						valid = false;
                    } else $('#dateGroup').removeClass('has-error');

                	// Number of Sales
                    if (this.numSales == '') {
						$('#numOfSalesGroup').addClass('has-error');
						valid = false;
                    } else $('#numOfSalesGroup').removeClass('has-error');

                	// Return
                    if (valid) {
						return true;
                    } else return false;
                    
                }
                else if (pageIndex == 1) {

                	// Ship Cash
                    if (this.shipCash == '') {
						$('#shipCashGroup').addClass('has-error');
						valid = false;
                    } else $('#shipCashGroup').removeClass('has-error');

                	// Club Z
                    if (this.clubZ == '') {
						$('#clubZGroup').addClass('has-error');
						valid = false;
                    } else $('#clubZGroup').removeClass('has-error');

                	// Return
                    if (valid) {
						return true;
                    } else return false;
                    
                }
                else if (pageIndex == 2) {

                	// Sales MTD
                    if (this.salesMTD == '') {
						$('#salesMTDGroup').addClass('has-error');
						valid = false;
                    } else $('#salesMTDGroup').removeClass('has-error');

                	// Ship Cash MTD
                    if (this.shipCashMTD == '') {
						$('#shipCashMTDGroup').addClass('has-error');
						valid = false;
                    } else $('#shipCashMTDGroup').removeClass('has-error');

                	// Club Z MTD
                    if (this.clubZMTD == '') {
						$('#clubZMTDGroup').addClass('has-error');
						valid = false;
                    } else $('#clubZMTDGroup').removeClass('has-error');

                	// Return
                    if (valid) {
						return true;
                    } else return false;
                    
                }
                else if (pageIndex == 3) {

                	// Sales Goal
                    if (this.salesGoal == '') {
						$('#salesGoalGroup').addClass('has-error');
						valid = false;
                    } else $('#salesGoalGroup').removeClass('has-error');

                	// Ship Cash Goal
                    if (this.shipCashGoal == '') {
						$('#shipCashGoalGroup').addClass('has-error');
						valid = false;
                    } else $('#shipCashGoalGroup').removeClass('has-error');

                	// Club Z Goal
                    if (this.clubZGoal == '') {
						$('#clubZGoalGroup').addClass('has-error');
						valid = false;
                    } else $('#clubZGoalGroup').removeClass('has-error');

                	// Return
                    if (valid) {
						return true;
                    } else return false;
                    
                }
                else {
					return true;
                }

            },
            calcResults: function() {

				var datePieces = this.date.split('-');
				var dd = Number(datePieces[2]);
				var mm = Number(datePieces[1]);
				var yyyy = Number(datePieces[0]);

				var lastDayOfMonth = new Date(Number(yyyy), Number(mm), 0);
				var numDaysInMonth = lastDayOfMonth.getDate();

				// Sales
				var salesMTD = this.addNumbers(this.numSales, this.salesMTD);
				var salesProj = this.getProjection(salesMTD, dd, numDaysInMonth);
				var salesProjPerc = this.getProjectionPercent(salesProj, this.salesGoal);

				this.resultsText = 'Sales: '+ this.formatNumber(this.numSales) +'\n';
				this.resultsText += 'Sales MTD: '+ this.formatNumber(salesMTD) +'\n';
				this.resultsText += 'Sales Proj: '+ this.formatNumber(salesProj) +' ('+ this.formatNumber(salesProjPerc) +'%)\n';
				this.resultsText += '\n';

				// Ship Cash
				var shipCashMTD = this.addNumbers(this.shipCash, this.shipCashMTD);
				var shipCashProj = this.getProjection(shipCashMTD, dd, numDaysInMonth);
				var shipCashProjPerc = this.getProjectionPercent(shipCashProj, this.shipCashGoal);
				
				this.resultsText += 'Ship Cash: '+ this.formatNumber(this.shipCash) +'\n';
				this.resultsText += 'Ship Cash MTD: '+ this.formatNumber(shipCashMTD) +'\n';
				this.resultsText += 'Ship Cash Proj: '+ this.formatNumber(shipCashProj) +' ('+ this.formatNumber(shipCashProjPerc) +'%)\n';
				this.resultsText += '\n';

				// Club Z
				var clubZMTD = this.addNumbers(this.clubZ, this.clubZMTD);
				var clubZProj = this.getProjection(clubZMTD, dd, numDaysInMonth);
				var clubZProjPerc = this.getProjectionPercent(clubZProj, this.clubZGoal);
				
				this.resultsText += 'Club Z: '+ this.formatNumber(this.clubZ) +'\n';
				this.resultsText += 'Club Z MTD: '+ this.formatNumber(clubZMTD) +'\n';
				this.resultsText += 'Club Z Proj: '+ this.formatNumber(clubZProj) +' ('+ this.formatNumber(clubZProjPerc) +'%)\n';
            	
            },
            addNumbers: function(numOne, numTwo) {
                
				return (Number(numOne) + Number(numTwo)).toFixed(2);
            },
            formatNumber: function(num) {

				return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            getProjection: function(MTD, days, numDaysInMonth) {

				return ((Number(MTD) / Number(days)) * Number(numDaysInMonth)).toFixed(2);
            },
            getProjectionPercent: function(proj, goal) {

            	return ((Number(proj) / Number(goal)) * 100).toFixed(0);
            },
            copyResults: function() {

				$('#resultsText').select();
				document.execCommand("copy");
            },
            updateProgressBar: function() {

            	var currIndex = this.activePageIndex;
				var pageLength = this.pages.length - 1;
				this.progressWidth = (currIndex / pageLength) * 100;
            }
      	},
        beforeMount(){
        	this.initPage()
        }
    });

	
});

</script>
	


    </script>
    </body>
</html>