<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Finalize Sale
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h4>

                </div>
                <form action="{{route('sale.storeFromAddToCartWithPayment')}}" method="POST">
                @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                               @php
                                $cartName = session()->has('cartName') ? session()->get('cartName')  : [];
                                @endphp
                                @foreach ($cartName as $key => $item)
                                    <label>
                                        <input type="hidden"  name="product_id[]"  value="{{ $item['productVari_id'] }}"/>
                                        <input type="hidden"  name="sale_price[]"  value="{{ $item['sale_price'] }}"/>
                                        <input type="hidden"  name="quantity[]"  value="{{ $item['quantity'] }}"/>
                                        <input type="hidden"  name="discount_value[]"  value="{{ $item['discountValue'] }}"/>
                                        <input type="hidden"  name="discount_type[]"  value="{{ $item['discountType'] }}"/>
                                        <input type="hidden"  name="product_sub_Total_sale_amount[]"  value="{{ $item['netTotalAmount'] }}"/>
                                        <input type="hidden"  name="identity_number[]"  value="{{ $item['identityNumber'] }}"/>

                                        <input type="hidden"  name="sale_type_id[]"  value="{{ $item['sale_type_id'] }}"/>
                                        <input type="hidden"  name="sale_from_stock_id[]"  value="{{ $item['sale_from_stock_id'] }}"/>
                                        <input type="hidden"  name="sale_unit_id[]"  value="{{ $item['sale_unit_id'] }}"/>
                                    </label>
                                    <br/>
                                @endforeach
                                <br/>
                                <input type="hidden" name="customer_id" value="{{$customer_id}}"/>
                                <input type="hidden" name="employee_Id" value="{{$employee_Id}}"/>
                                <input type="hidden" name="fianl_total_item" value="{{$fianl_total_item}}"/>
                                <input type="hidden" name="final_sub_total_amount" value="{{$final_sub_total_amount}}"/>
                                <input type="hidden" name="final_discount_type" value="{{$final_discount_type}}"/>
                                <input type="hidden" name="final_discount_value" value="{{$final_discount_value}}"/>
                                <input type="hidden" name="final_discount_amount" value="{{$final_discount_amount}}"/>
                                <input type="hidden" name="fianl_other_cost" value="{{$fianl_other_cost}}"/>
                                <input type="hidden" class="cr_fianl_payable_amount_get" id="fianl_payable_amount_get" name="fianl_payable_amount" value="{{$fianl_payable_amount}}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Previous Due <span class="pull-right">tk <strong>0.00</strong></span></p>
                                <p>Grand Total <span class="pull-right">tk <strong>{{$fianl_payable_amount}}</strong></span></p>
                                <p>Total Payable <span class="pull-right">tk <strong>{{$fianl_payable_amount}}</strong></span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin:2%;">
                            <div class="col-sm-6">
                                <label>Paid Amount</label>
                                <input type="number" step="any" id="final_payable_amount"  name="paid_amount" value="{{$fianl_payable_amount}}" placeholder="Paid Amount" class="cr_final_payable_amount form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Due Amount</label>
                                <input type="number" step="any" id=""  disabled value="" placeholder="Due Amount" class="cr_final_due_amount form-control">
                                <input type="hidden" step="any" id=""  name="due_amount" value="" placeholder="Due Amount" class="cr_final_due_amount form-control">
                            </div>
                        </div>

                       
                        <div style="border:1px dashed red;">
                            <p class="text-center mt-10">
                                <strong>This section just to help</strong>
                            </p>
                            <div class="row mt-10" style="margin-bottom:2%;padding:0 2% 0 2%;">
                                <div class="col-sm-6">
                                    <label>Given Amount</label>
                                    <input type="number" step="any" id=""   placeholder="Given Amount" class="cr_given_amount_for_take_and_change form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Change Amount</label>
                                    <input type="number" step="any" disabled id="" placeholder="Change Amount" class="cr_change_amount_after_calculation form-control">
                                </div>
                            </div>
                        </div>
                        

                        <div class="row mt-10" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label>Account</label>
                            </div>
                            <div class="col-sm-6">
                                <select name="payment_method" class="form-control">
                                    <option value="1">Cash</option>
                                    <option value="2">Card</option>
                                    <option value="3">Rocket</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-10">
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                        <input name="send_sms" value="1" type="checkbox" class="colored-blue">
                                        <span class="text">Send Invoice Via SMS</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="checkbox">
                                    <label>
                                        <input  name="send_email" value="1" type="checkbox" class="colored-blue">
                                        <span class="text">Send Invoice Via Email</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Account Note</label>
                                <textarea name="account_note" rows="3" class="form-control" placeholder="Enter..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="hidden" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>