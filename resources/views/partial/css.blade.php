    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href={{ URL::to('/css/bootstrap.css') }}>

    {{-- RESPONSIVE --}}
    <link rel="stylesheet" href={{ URL::to('/css/responsive.css') }}>

    <!-- SIDEBAR -->
    <link rel="stylesheet" href={{ URL::to('/css/sidebar.css') }}>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    {{-- FONTAWESOME  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- BOOSTRAP JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- TOASTR JS CSS --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    {{-- ICON --}}
    <link rel="icon" href="{{ URL::to('/image/icon.png') }}">

    <style>
        /* width */
        ::-webkit-scrollbar {
          width: 10px;
        }
        
        /* Track */
        ::-webkit-scrollbar-track {
          background: white; 
        }
         
        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #bbb; 
        }
        
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: #888; 
        }
        .fa-instagram {
            background: linear-gradient(45deg,yellow, red, magenta);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        @media screen and (max-width: 600px) {
            .fa-brands {
              font-size: 20px;
            }

            .social-text-h4 {
              font-size: 20px;
            }

            .copyright-footer {
              font-size: 12px;
            }
        }

        @media screen and (max-width: 300px) {
            .fa-brands {
              font-size: 16px;
            }

            .social-text-h4 {
              font-size: 20px;

            }
        }
  
    </style>