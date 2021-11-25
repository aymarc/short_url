<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Url Shortening Service</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link href="{{URL::asset('css/bootstrap.css') }}" rel="stylesheet">
       <script>
             const apiUrl = "http://127.0.0.1:8000/api";
            

            //Get saved data from localStorage
            const session = localStorage.getItem('session') ? JSON.parse(localStorage.getItem('session')) : '';
            let token = "";
            if(session === ""){
                window.location.href="/";
            }else{
                token = session.access_token;
            }
            console.log("token :", token);

          
                
        </script>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}

       </style>

        <style>
            html,body {
                font-family: 'Nunito', sans-serif;
                overflow-y:hidden;
            }
            
            table td,  table th{
                border:1px solid #52778c;
                padding:5px;
            }

            .delete{
                 color:#d80d0d;
            }
            .delete:hover{
                color:#ff9e9e;
            }

            .ring
            {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:50px;
            height:50px;
            background:transparent;
            /* border:3px solid #3c3c3c; */
            border-radius:50%;
            text-align:center;
            line-height:150px;
            font-family:sans-serif;
            font-size:20px;
            color:#AA1515;
            letter-spacing:4px;
            text-transform:uppercase;
            text-shadow:0 0 10px #AA1515;
            box-shadow:0 0 20px rgba(0,0,0,.5);
            }
            .ring:before
            {
            content:'';
            position:absolute;
            top:-3px;
            left:-3px;
            width:100%;
            height:100%;
            border:3px solid transparent;
            border-top:3px solid #AA1515;
            border-right:3px solid #AA1515;
            border-radius:50%;
            animation:animateC 2s linear infinite;
            }
            #loader{
                position:relative;
                width: 100%;
                height:100%;
                background-color: rgba(1,1,1, 0.6);
                border-radius:5px;
                z-index: 2;
                display:none;
            }
            #spinner
            {
            display:block;
            position:absolute;
            top:calc(50% - 2px);
            left:50%;
            width:50%;
            height:4px;
            background:transparent;
            transform-origin:left;
            animation:animate 2s linear infinite;
            }
            #spinner:before
            {
            content:'';
            position:absolute;
            width:16px;
            height:16px;
            border-radius:50%;
            background:#AA1515;
            top:-6px;
            right:-8px;
            box-shadow:0 0 20px #AA1515;
            }
            @keyframes animateC
            {
            0%
            {
                transform:rotate(0deg);
            }
            100%
            {
                transform:rotate(360deg);
            }
            }
            @keyframes animate
            {
            0%
            {
                transform:rotate(45deg);
            }
            100%
            {
                transform:rotate(405deg);
            }
            }

            .card form{
                width:100%
            }
            .card form input{
                width:450px;
                border-radius:5px;
                padding:5px;
                font-size:15px;
            }
            table thead th:1{
                width:10%;
            }
            table thead th:2{
                width:20%;
            }
            table thead th:3{
                width:50%;
            }
            table thead th:4{
                width:20%;
            }

            #logout{
                background: transparent;
            }
            #logout:hover{
                background: #52778c;
            }
        </style>
    </head>
    <body style="height: 800px; overflow-y:hidden, width:100% " class="">
        <div style=" width:800px; margin:auto; top:10%; padding-top:90px;" class=" sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">    
                <div>    
                    <h1>Url Shortening Service</h1>
                    <span id="logout" style="position:relative; left:80%; top:-40px; font-weight:bold; font-size:20px; padding:3px; cursor:pointer; box-shadow:0 1px 3px #111; border:1px #000 solid; border-radius:6px">
                    <i  style="color:red" class="fa fa-power-off" ></i>
                     Logout
                    </span>
                </div>
                <div class="card">
                    <form method="post" id="full-url-form" accept-charset="utf-8">
                       
                        <br/>
                        <label>Url Form</label>
                        <br/>
                        <input id="full-url" required style="border:1px #000 solid;" name="destination" type="text" placeholder="paste a link here">
                        <br/>   
                        <button type="submit" style="padding:8px; background-color:#52778c; 
                            width:80px; border-radius:5px;color:#fff; margin-top:8px; cursor:pointer;">
                            Save
                        </button>                 
                    </form>

                    <div style="background-color:#000; padding:10px;color:#fff; margin-top:30px; border-radius:5px; height:350px; overflow-y: auto">
                                <h3>Recent links</h3>
                            <table style="border:1px #fff solid; width:700px;">
                                <thead>
                                    <th>No</th>
                                    <th>Short url</th>
                                    <th>Full url</th>
                                    <th>Date</th>                                  
                                </thead>
                                <tbody>
                                @foreach ($latestUrls as $key=>$url)
                                        <tr>
                                            <td>{{$key + 1}}</td>  
                                            <td>{{$url->shortened_url}}</td>
                                            <td >
                                                {{$url->destination}}
                                            </td>
                                            <td >
                                                {{$url->created_at}}
                                            </td>
                                        </tr>      
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- <div id="loader">
                                <div  style="display:block" class="ring">
                                    <span id="spinner"></span>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>


        <script>
                ( ()=>{
                    const logoutBtn = document.getElementById("logout"); 
                    const fullUrlForm = document.getElementById("full-url-form");
                    async function postDataWithAuth(route,body,method="GET", token=""){
                
                        try{
                            const getDataPost = await fetch(`${apiUrl}${route}`, {
                                    method,
                                    body,
                                    headers:new Headers({
                                        'Authorization': `Bearer ${token}`, 
                                    })
                                }
                            )

                            return await getDataPost.json();
                        }catch(e){
                            console.error(e)
                        }
                    }

                    fullUrlForm.addEventListener("submit", async(e)=>{
                        e.preventDefault();
                        const formData = new FormData(e.target);
                        // for(const elem of formData.values()){
                        //     console.log(elem);
                        // }
                        const response = await postDataWithAuth("/url",formData,"POST", token);
                        //console.log("submit url response", response);
                        if(response.success){
                            window.location.reload();
                        }
                    })

                    logoutBtn.addEventListener("click", async(e)=>{
                        e.preventDefault();
                        const response = await postDataWithAuth("/auth/logout",null,"POST", token);
                        //console.log("submit url response", response);
                      
                        localStorage.removeItem('session');
                        window.location.href = "/";
                        
                    })
                    
             
                })()

        </script>
    </body>
</html>
