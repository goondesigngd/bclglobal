@extends("main")
@section("content")
    <section class="pag" id="top"></section>
    <main class="center">
        <section class="members">
            <div class="tit tit_color">
                <h1>@lang('content.membros.titulo')</h1>
            </div>
            <ul class="members__list">
                @for($i = 0; $i < 6; $i++)
                <li class="members__item">
                    <img class="members__img" src="https://i0.wp.com/wlink.org/wp-content/uploads/2024/09/1.png?w=1080&ssl=1" alt="Dr. Manny Fernandez Jr.">
                    <h2 class="members__name">Dr. Manny Fernandez Jr.</h2>
                    <p>Founder & CEO</p>
                    <details class="members__details">
                        <summary class="members__details__title">@lang('content.membros.botao-detalhes')</summary>
                        <p class="members__details__content">Dr. Manny Fernandez graduated with a Masters in Theology in 1983 and a Doctorate of Ministry from Dallas Theological Seminary in 1996. He founded World Link Ministries and the European Seminary of Theological Formation and Evangelization in Madrid Spain in 1991. He continues to serve as Chairman and CEO of WLM as he oversees the expansion of the ministry which has spread globally. Dr. Manny is a member at First Baptist Church of Dallas. He is married to Glenda and has three children and nine grandchildren.</p>
                    </details>
                </li>
                @endfor
            </ul>
        </section>
    </main>
@endsection