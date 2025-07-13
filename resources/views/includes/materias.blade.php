<section class="links">
	<div class="links_interno center">
		<div class="tit">
			<h2>@lang('content.capacitacao.materias')</h2>
		</div>
		@for($i = 0; $i < count($arr_materias); $i++)
			<div class="links_col">
				@for($i2 = 0; $i2 < count($arr_materias[$i]); $i2++)
					<div class="links_lin">
						{{ Util::getPropFromArray($arr_materias[$i], $i2, 'titulo') }}
					</div>
				@endfor
			</div>
		@endfor
		<div style="clear: both;"></div>
	</div>
</section>