
<x-manager_panel>


    <h4 class="d-block text-center mt-4"> جدول دسته بندی منوها</h4>
    
    <div class="row mt-4">
        <div class="col-10 mx-auto mt-3">


            <table class="table ">
                <thead>

                  <tr class="text-center">

                    <th scope="col">شماره ردیف</th>

                    <th scope="col">نام فرستنده</th>

                    <th scope="col">وضعیت</th>

                    <th scope="col">مشاهده</th>

                    <th scope="col">درخواست حذف</th>

                    <th scope="col">تایید</th>

                  </tr>

                </thead>


                <tbody>

                  @foreach ($comments as $comment)
                      
                  
                  <tr class="text-center">


                    <th scope="row">
                        {{$loop->iteration}}
                    </th>

                    <td>
                        {{$comment->order->user->email}}
                    </td>

                    <td>
                      {{$comment->status}}
                    </td>
                          
                    <td>
                        <button class="btn btn-table bg-light-blue "  data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-sharp fa-solid fa-eye text-light"></i>
                        </button>
                    </td>

                    <td>
                      {{-- <form method="POST" action="/manager/menu/{{$menu->id}}"> --}}
                        
                        @csrf

                        <button class="btn btn-table bg-light-red ">
                            <i class="fa-solid fa-trash  text-light"></i>
                        </button>

                      {{-- </form> --}}
                    </td>

                    <td>
                      {{-- <form method="POST" action="/manager/menu/{{$menu->id}}"> --}}
                        
                        @csrf

                        <button class="btn btn-table bg-light-green ">
                            <i class="fa-sharp fa-solid fa-check text-light"></i>
                        </button>

                      {{-- </form> --}}
                    </td>

                    
          
                  </tr>

                  @endforeach



                </tbody>
              </table>


        </div>
    </div>

</x-manager_panel>