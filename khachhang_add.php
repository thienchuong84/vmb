<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
		 	<div class="panel-heading" style="">
		 		<div class="row">
		 			<div class="col-xs-6 col-md-6">
		 				<h4 class="pull-left">Thêm khách hàng mới</h4>
		 				<!--<a href="#navSearch" class="btn btn-default pull-right" role="button" aria-controls="navAdd" data-toggle="tab">Search</a> -->
		 			</div>
					<!-- <div class="col-xs-6 col-md-6"><button type="button" class="btn btn-default active" style="float: right;">Lưu</button></div> -->
					<div class="col-xs-6 col-md-6"><button id="luuKH" name="luuKH" class="btn btn-primary pull-right">Lưu</button></div>
				</div>
			</div>
		  <div class="panel-body">
		  	<div class="row">
		  		<div class="col-xs-9 col-md-6">
					<form class="form-horizontal" id="saveKH" method="post">
					<!-- Text input-->
					<div class="row">
					<div class="form-group">
					  <label class="col-xs-6 col-md-4 control-label" for="fullname">Tên KH</label>
					  <div class="col-xs-12 col-md-8 clearfix">
					  <input id="fullname" name="fullname" placeholder="" class="form-control input-md" required="" type="text">				    
					  </div>
					</div>
					</div>

					<!-- Text input-->
					<div class="row">
					<div class="form-group">
					  <label class="col-xs-6 col-md-4 control-label" for="mobile">Số đt</label> 
					  <div class="col-xs-12 col-md-8">
					  <input id="mobile" name="mobile" placeholder="" class="form-control input-md" required="" type="text">			    
					  </div>
					  <div class="clearfix visible-xs-block visible-md-block"></div>
					</div>
					</div>

					<!-- Text input-->
					<div class="row">
					<div class="form-group">
					  <label class="col-md-4 control-label" for="full_address">Địa chỉ</label>  
					  <div class="col-md-8">
					  <input id="full_address" name="full_address" placeholder="" class="form-control input-md" type="text">				    
					  </div>
					</div>
					</div>

					<!-- Text input-->
					<div class="row">
					<div class="form-group">
					  <label class="col-md-4 control-label" for="note_full_address">Ghi chú đ.c</label>  
					  <div class="col-md-8">
					  <input id="note_full_address" name="note_full_address" placeholder="" class="form-control input-md" type="text">				    
					  </div>
					</div>
					</div>

					<!-- Text input-->
					<div class="row">
					<div class="form-group">
					  <label class="col-md-4 control-label" for="email">Email</label>  
					  <div class="col-md-8">
					  <input id="email" name="email" placeholder="" class="form-control input-md" type="text">				    
					  </div>
					</div>
					</div>
				</div>

				<div class="col-xs-9 col-md-6">
					<!-- Textarea -->
					<div class="row">
					<div class="form-group">
					  <label class="col-md-2 control-label" for="note">Ghi chú</label>
					  <div class="col-md-10">                     
					    <textarea class="form-control" id="note" name="note" style="height: 200px;"></textarea>
					  </div>
					</div>
					</div>

					<!-- Button 
					<div class="row">
					<div class="form-group">
					  <label class="col-md-2 control-label" for="submit"></label>
					  <div class="col-md-4">
					    <button id="submit" name="submit" class="btn btn-primary">Lưu</button>
					  </div>
					</div>
					</div>
					-->				
					</form>
				</div>
			</div>

		  </div><!-- END div panel-body -->
		</div>
	</div>
</div>