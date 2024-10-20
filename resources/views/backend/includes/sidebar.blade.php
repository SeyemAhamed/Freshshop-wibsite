  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
 
   <style media="screen">
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

*{
 margin: 0;
 padding: 0;
 box-sizing: border-box;
 font-family: "Poppins", sans-serif;
}

body{
 min-height: 100vh;
 background: white;
 color: white;
 background-size: cover;
 background-position: center;
}

.side-bar{
 background: #1b1a1b;
 backdrop-filter: blur(15px);
 width: 250px;
 height: 100vh;
 position: fixed;
 top: 0;
 left: -250px;
 overflow-y: auto;
 transition: 0.6s ease;
 transition-property: left;
}
.side-bar::-webkit-scrollbar {
  width: 0px;
}



.side-bar.active{
 left: 0;
}
h1{

  text-align: center;
  font-weight: 500;
  font-size: 25px;
  padding-bottom: 13px;
  font-family: sans-serif;
  letter-spacing: 2px;
}

.side-bar .menu{
 width: 100%;
 margin-top: 30px;
}

.side-bar .menu .item{
 position: relative;
 cursor: pointer;
}

.side-bar .menu .item a{
 color: #fff;
 font-size: 16px;
 text-decoration: none;
 display: block;
 padding: 5px 30px;
 line-height: 60px;
}

.side-bar .menu .item a:hover{
 background: #33363a;
 transition: 0.3s ease;
}

.side-bar .menu .item i{
 margin-right: 15px;
}

.side-bar .menu .item a .dropdown{
 position: absolute;
 right: 0;
 margin: 20px;
 transition: 0.3s ease;
}

.side-bar .menu .item .sub-menu{
 background: #262627;
 display: none;
}

.side-bar .menu .item .sub-menu a{
 padding-left: 80px;
}

.rotate{
 transform: rotate(90deg);
}

.close-btn{
 position: absolute;
 color: #fff;

 font-size: 23px;
 right:  0px;
 margin: 15px;
 cursor: pointer;
}

.menu-btn{
 position: absolute;
 color: rgb(0, 0, 0);
 font-size: 35px;
 margin: 25px;
 cursor: pointer;
}

.main{
 height: 100vh;
 display: flex;
 justify-content: center;
 align-items: center;
 padding: 50px;
}

.main h1{
 color: rgba(255, 255, 255, 0.8);
 font-size: 60px;
 text-align: center;
 line-height: 80px;
}

@media (max-width: 900px){
 .main h1{
   font-size: 40px;
   line-height: 60px;
 }
}
img{
  width: 100px;
  margin: 15px;
  border-radius: 50%;
  margin-left: 70px;
  border: 3px solid #b4b8b9;
}
header{
  background: #33363a;
}

   </style>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 <body>

   <div class="menu-btn">
     <i class="fas fa-bars"></i>
   </div>


   <div class="side-bar">

     <div class="menu">
      <div class="item"><a href="{{url('/admin/dashboard')}}"><i class="fas fa-desktop"></i>Dashboard</a></div>
      <div class="item">
        @if (auth()->user()->role ==1)
        <div class="item">
          <a class="sub-btn"><i class="fas fa-table"></i>Category<i class="fas fa-angle-right dropdown"></i></a>
          <div class="sub-menu">
            <a href="{{url('/admin/category/list')}}" class="sub-item">List</a>
            <a href="{{url('/admin/category/create')}}" class="sub-item">Add New</a>
          </div>
        </div>
        <div class="item">
         <a class="sub-btn"><i class="fas fa-table"></i>Sub-Category<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="{{url('/admin/sub-category/list')}}" class="sub-item">List</a>
           <a href="{{url('/admin/sub-category/create')}}" class="sub-item">Add New</a>
         </div>
       </div>
       <div class="item">
         <a class="sub-btn"><i class="fas fa-table"></i>Products<i class="fas fa-angle-right dropdown"></i></a>
         <div class="sub-menu">
           <a href="{{url('/admin/product/list')}}" class="sub-item">List</a>
           <a href="{{url('/admin/product/create')}}" class="sub-item">Add New</a>
         </div>
       </div>
        @endif
      <div class="item">
        <a class="sub-btn"><i class="fas fa-table"></i>Order<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="{{url('/admin/order/all-orders')}}" class="sub-item">All Orders</a>
          <a href="{{url('/admin/order/pending-orders')}}" class="sub-item">Pending Orders</a>
          <a href="{{url('/admin/order/confirmed-orders')}}" class="sub-item">Confirmed Orders</a>
          <a href="{{url('/admin/order/delivered-orders')}}" class="sub-item">Delivered Orders</a>
          <a href="{{url('/admin/order/cancelled-orders')}}" class="sub-item">Cancelled Orders</a>
        </div>
      </div>
      @if (auth()->user()->role ==1)
      <div class="item">
        <a class="sub-btn"><i class="fas fa-table"></i>Employee<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="{{url('/admin/employee-list')}}" class="sub-item">List</a>
          <a href="{{url('/admin/employee-create')}}" class="sub-item">Add New</a>
        </div>
      </div>
      <div class="item">
        <a class="sub-btn"><i class="fas fa-table"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="{{url('/admin/general-setting')}}" class="sub-item">General Setting</a>
          <a href="{{url('/admin/home-banner')}}" class="sub-item">Home Banner</a>
        </div>
      </div>
      @endif
      <div class="item">
        <a class="sub-btn"><i class="fas fa-table"></i>Authentication<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="{{url('/admin/logout')}}" class="sub-item">Logout</a>
          <a href="{{url('/admin/credntials')}}" class="sub-item">Credentials</a>
        </div>
      </div>
     </div>
   </div>
   

   <script type="text/javascript">
   $(document).ready(function(){
     //jquery for toggle sub menus
     $('.sub-btn').click(function(){
       $(this).next('.sub-menu').slideToggle();
       $(this).find('.dropdown').toggleClass('rotate');
     });

     //jquery for expand and collapse the sidebar
     $('.menu-btn').click(function(){
       $('.side-bar').addClass('active');
       $('.menu-btn').css("visibility", "hidden");
     });

     $('.close-btn').click(function(){
       $('.side-bar').removeClass('active');
       $('.menu-btn').css("visibility", "visible");
     });
   });
   </script>

 </body>
    <!-- /.sidebar -->
  </aside>