<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

@include('admin.css')

<body>
 @include('admin.side')

        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('admin.navbar')
            <!-- end of navbar navigation -->
            @include('admin.body')
            </div>
        </div>
    </div>
   @include('admin.footer')
</body>

</html>
