<x-admin_panel>

    <h4 class="d-block text-center mt-4">لیست فود پارتی ها</h4>

    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">تاریخ برگزاری</th>

                    <th scope="col">وضعیت</th>

                    <th scope="col">ویرایش</th>

                    <th scope="col">حذف</th>

                  </tr>

                </thead>


             
              </table>


        </div>
    </div>



         <div class="add-item-heaeder pointer" data-bs-toggle="modal" data-bs-target="#food_party_modal"> 

            ایجاد فودپارتی

            <i class="fa-solid fa-plus"></i>

         </div>

         {{-- ADD-Food_PARTY-MODAL --}}
       
         <div class="modal fade" id="food_party_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-center w-100" id="exampleModalLabel">ایجاد غذا</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <form method="POST" action="/admin/food" >
    
                  @csrf
                    <div class="modal-body">
                
                            <div class="mb-3">
                                
                              <label for="exampleInputEmail1" class="form-label w-100 text-right">تاریخ آغاز</label>
            
                              <input type="date" name="name" class="form-control example1" aria-describedby="emailHelp">
                         
                            </div>

                            <div class="mb-3">

                              <label for="exampleInputEmail1" class="form-label w-100 text-right">تاریخ پایان</label>
    
                              <input type="date" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              
                            </div>

                            <div class="mb-3">

                              <label for="exampleInputEmail1" class="form-label w-100 text-right">ساعت شروع</label>
    
                              <input type="time" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              
                            </div>


                            <div class="mb-3">

                              <label for="exampleInputEmail1" class="form-label w-100 text-right">ساعت پایان</label>
    
                              <input type="time" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              
                            </div>
    
                 
                          
             
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                      <button type="submit" class="btn btn-primary">اضفه کردن</button>
                    </div>
    
    
                </form>
    
    
              </div>
            </div>
         </div>
    
          {{-- END-Food_PARTY-MODAL --}}

</x-admin_panel>