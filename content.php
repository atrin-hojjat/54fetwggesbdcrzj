<div class="col-12 mx-auto" id="panel-bar">
        <div class="card card-bar my-5">
          <div class="card-body">
          <div class="row">
    		<div class="col-md-auto offset-md-3">
                <h1><img src="logo.png" height="34px"> مجتمع علامه طباطبایی | <span>زیست شناسی</span></h1>
            </div>
            <div class="col-md-auto float-left">
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" data-toggle="modal" data-target="#myModal" >پرسش از استاد</button>
            </div>
            <a class="col-md-auto float-left" href="logout.php">
                <button class="btn btn-lg btn-danger d-inline-block rounded-pill">خروج</button>
			</a>
          </div>
            </div>
            </div>
        </div>
    		<div class="col-12 mx-auto">
            <div class="card card-content my-5" id="content-box">
			</div>
        </div>
        
        <!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content project-details-popup">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-header">
					<h2>پرسش از استاد</h2>
				</div>
				<div class="modal-body">
					<div class="alert alert-success contact__msg" style="display: none" role="alert">
						سوال شما با موفقیت به استاد ارسال گردید.
					</div>
					<div class="col-md-12">
						<form onsubmit="return false;" id="question-box">
							<div class="form-group">
								<input type="text" class="form-control" id="firstlastname" value="<?php echo $_SESSION['flname'];?>" name="firstlastname" required hidden><br>
								<label for="InputQuestion">متن سوال شما:</label>
								<textarea class="form-control" id="question" rows="5" name="question" required></textarea>
							</div>
							<input type='submit' value='ارسال پرسش' id="submit" class="btn btn-success" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>