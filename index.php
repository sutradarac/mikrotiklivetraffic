<?php require('header.php'); ?>
	<div class="data-table-rows slim">
                <div class="row mb-1">
                  <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                    <h3 class="text-primary mb-0 pb-0">Traffic Interface</h3>
                    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                      <ul class="breadcrumb pt-0">
                        <li class="breadcrumb-item"><a href="#">Gtlo</a></li>
                        <li class="breadcrumb-item"><a href="#">Mikrotik</a></li>
                        <li class="breadcrumb-item"><a href="#">Traffic Interface</a></li>
                      </ul>
                    </nav>
                  </div>


                  <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-user"></i>
                      </button>
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-users"></i>
                      </button>
                    </div>
                    <div class="d-inline-block">
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-list"></i>
                      </button>
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-coins"></i>
                      </button>
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-map"></i>
                      </button>
                      <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow">
                        <i class="fa fa-cog"></i>
                      </button>
                    </div>
                  </div>
                </div>
        </div>
        <div class="card shadow hover-scale-up cursor-pointer mb-3">
			<div class="card-body">
				<div id="container"></div>
				<div class="row p-0">
					<div hidden>
						<select id="type_interface" name="type_interface">
							<option value="0" selected>interfaces</option>
						</select>
					</div>
					<div class="col-6 float-left col-form-label" id="trafik"></div>
					<div class="col-6 text-end">
						<select class="form-select" name="interface" id="interface">
							<?php
								foreach( $data as $index => $baris ) : 
									echo "<option value='".$baris['name']."'>".$baris['name']."</option>";
								endforeach;
							?>
						</select>
					</div>
				</div>
			</div>
		</div>

<?php require('footer.php'); ?>
