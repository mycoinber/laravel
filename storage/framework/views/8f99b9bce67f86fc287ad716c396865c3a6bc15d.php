<?php $__env->startSection('content'); ?>

    <?php
        $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
    ?>
    <!-- Company Overview section START -->
    <section class="container-fluid inner-Page" >
        <div class="card-panel">
            <div class="media wow fadeInUp" data-wow-duration="1s">
                <div class="companyIcon">
                </div>
                <div class="media-body">

                    <div class="container">
                        <?php if(session('success_msg')): ?>
                            <div class="alert alert-success fade in alert-dismissible show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                <?php echo e(session('success_msg')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('error_msg')): ?>
                            <div class="alert alert-danger fade in alert-dismissible show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                <?php echo e(session('error_msg')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Payment</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6" style="background: lightgreen; border-radius: 5px; padding: 10px;">
                                <div class="panel panel-primary">
                                    <div class="creditCardForm">
                                        <div class="payment">
                                            <form id="payment-card-info" method="post" action="/payments/payment-request">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                                <input type="hidden" name="gateway" value="<?php echo e($paymentChannel->id); ?>">
                                                <input type="hidden" name="gateway_page" value="authorizenet_payment_card">

                                                <div class="row">
                                                    <div class="form-group owner col-md-8">
                                                        <label for="owner">Owner</label>
                                                        <input type="text" class="form-control" id="owner" name="owner" value="<?php echo e(old('owner')); ?>" required>
                                                        <span id="owner-error" class="error text-red">Please enter Owner Card name</span>
                                                    </div>
                                                    <div class="form-group CVV col-md-4">
                                                        <label for="cvv">CVV</label>
                                                        <input type="number" class="form-control" id="cvv" name="cvv" value="<?php echo e(old('cvv')); ?>" required>
                                                        <span id="cvv-error" class="error text-red">Please enter cvv</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-8" id="card-number-field">
                                                        <label for="cardNumber">Card Number</label>
                                                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="<?php echo e(old('cardNumber')); ?>" required>
                                                        <span id="card-error" class="error text-red">Please enter valid card number</span>
                                                    </div>
                                                    <!--<div class="form-group col-md-4" >-->
                                                    <!--    <label for="amount">Amount</label>-->
                                                <!--    <input type="number" class="form-control" id="amount" name="amount" min="1" value="<?php echo e(old('amount')); ?>" required>-->
                                                    <!--    <span id="amount-error" class="error text-red">Please enter amount</span>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6" id="expiration-date">
                                                        <label>Expiration Date</label><br/>
                                                        <select class="form-control" id="expiration-month" name="expiration-month" style="float: left; width: 100px; margin-right: 10px;">
                                                            <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($k); ?>" <?php echo e(old('expiration-month') == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <select class="form-control" id="expiration-year" name="expiration-year"  style="float: left; width: 100px;">

                                                            <?php for($i = date('Y'); $i <= (date('Y') + 15); $i++): ?>
                                                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                    <!--<div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">-->
                                                <!--    <img src="<?php echo e(asset('images/visa.jpg')); ?>" id="visa">-->
                                                <!--    <img src="<?php echo e(asset('images/mastercard.jpg')); ?>" id="mastercard">-->
                                                <!--    <img src="<?php echo e(asset('images/amex.jpg')); ?>" id="amex">-->
                                                    <!--</div>-->
                                                </div>

                                                <br/>
                                                <div class="form-group" id="pay-now">
                                                    <button type="submit" class="btn btn-success themeButton" id="confirm-purchase">Confirm Payment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/as453212/ed-libary.online/www/resources/views/web/default/cart/channels/authorizenet.blade.php ENDPATH**/ ?>