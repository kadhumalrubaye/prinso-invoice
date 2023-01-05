      <!-- post items  1-->

      <table class="table  table-bordered " id="item-form">


          <tbody>
              <tr>
                  <th scope="row">1</th>
                  <td>
                      <div class="form-group">

                          <input type="text" name="items[0][item_name]" class="form-control" id="itemName" aria-describedby="emailHelp" placeholder="اسم المنتج">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>

                  <td>
                      <div class="form-group">

                          <input type="number" name="items[0][quantity]" class="form-control" id="itemQuantity" aria-describedby="emailHelp" placeholder="الكمية" onblur="quantityVspriceVsoriginalPrice()">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>
                  <th scope="row">
                      <div class="form-group">

                          <input type="number" name="items[0][original_price]" class="form-control" id="itemOrginalPrice" aria-describedby="emailHelp" placeholder="السعر الاصلي">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </th>
                  <!-- <th scope="row">
                          total origianl
                      </th> -->
                  <td>
                      <div class="form-group">

                          <input type="number" onchange="getTotalPrice()" name="items[0][price]" class="form-control" id="itemPrice" aria-describedby="emailHelp" placeholder="سعر البيع">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                  </td>
                  <!-- <td>
                          total price
                      </td> -->
                  <td>
                      <div class="btn btn-primary" onclick="removeItemForm()">حذف</div>
                  </td>

                  <!-- <td>
                            <div class="form-group">

                                <input type="text" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </td> -->


              </tr>


          </tbody>
          <tfoot>
              <tr>


              </tr>
          </tfoot>
      </table>