### Welcome to the resurant

-resturant written based laravel freamwork

-this project its just **portfolio** 

# For Runing Follow This Instructions :

1. copy .env file and setup database
2. composer install
3. npm install
4. php artisan key:generate
5. php artisan migrate
6 php artisan db:seed
7. php artisan storage:link
8. php artisan serve
9. npm run dev


## resturant devied in two section :

1. ssg 

    -includes :
        -restruant manager registeration and dashboard
        -admin manager registeration and dashboard
    -routes :
    
        1-admin:
            /admin/login
            /admin/dashboard
            
        2-manager:
            /manager/login
            /manager/register
            /manager/dashboard
            
2. api

    ### auth:
    
        -api/v1/user/register (post)
        -api/v1/user/login  (post)
        
    ### address:
    
        -/api/v1/user/address (post) :
        
            -title (title)
            -address (string)
            -latitude (float)
            -longitude (float)
            
        -/api/v1/user/address/{address-id} (put):
        
            -title (title)
            -address (string)
            -latitude (float)
            -longitude (float)
            
        -/api/v1/user/address/{address-id} (get)
        -/api/v1/user/address/{address-id} (delete)
     
     ### resturant:
     
        -/api/v1/user/resturant (get)
        -/api/v1/user/resturant/{resturant_id}/food
     
     ### shoping-card: 
     
         -/api/v1/user/cart (post)
         
            -items (array of product id)
            
         -/api/v1/user/cart (get)
         -/api/v1/user/cart (delete)
         -/api/v1/user/cart/pay (post)
         
     ## comment:
        
        -/api/v1/user/comments
            
            -message (string)
            -socore (integer)
            -ordder_id (integer)
            
   
sample : 

![Screenshot (313)](https://user-images.githubusercontent.com/110903442/209545245-1abd6cec-3605-47b2-9ff1-4576a19b100a.png)
![Screenshot (312)](https://user-images.githubusercontent.com/110903442/209545265-c902c46b-fa5c-4c2a-9400-adbc7a598002.png)
![Screenshot (311)](https://user-images.githubusercontent.com/110903442/209545291-7891b08b-a9ac-4611-94d1-ec0eb3c526e3.png)
![Screenshot (310)](https://user-images.githubusercontent.com/110903442/209545429-3794c4bb-6d9c-4906-8cf4-5789b62d45d0.png)


