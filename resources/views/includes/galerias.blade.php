@for($i = 0; $i < count($arr_trabalhos); $i++)
	@for($i2 = 0; $i2 < $arr_trabalhos[$i]->countimgs; $i2++)
		<a href="{{ route('trabalho', ['cod' => Util::getPropFromArray($arr_trabalhos, $i, 'codpublicacao'), 'trabalho' => str_slug(Util::getPropFromArray($arr_trabalhos, $i, 'titulo'))]) }}">
			<div class="col3 fly" style="background: url({{ Util::getLinkImg($arr_trabalhos[$i]->imgs[$i2]->codfotocadastro, 'pq', Util::seoImgLink($arr_trabalhos[$i]->imgs[$i2], $arr_trabalhos[$i]->titulo)) }}) no-repeat top center; background-size: cover;">
				<div class="col3_shadow">
					<h2>{{ Util::getPropFromArray($arr_trabalhos, $i, 'titulo') }}</h2>
				</div>
			</div>
		</a>
	@endfor
@endfor