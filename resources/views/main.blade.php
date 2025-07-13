<!DOCTYPE html>
<html>
	@include("includes.meta")
    <body>
		@include("includes.analyticstracking")
        <div class="wrap">
			@include("includes.menu")
            <div class="content">
				@yield("content")
            </div>
            @include("includes.footer")
        </div>
    </body>
</html>