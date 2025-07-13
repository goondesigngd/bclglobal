<!doctype html>
<html>
	<head>
		<title>Contato feito pelo site {{$arr_loja[0]->site}}</title>
	</head>
	<body>
		<center style="background: #EEE; margin: 0px; padding: 0px !important; font-size:12px;">
			<div style="background-color:#f5f7fa">
				<table align="center" style="border-collapse:collapse;table-layout:fixed;color:#b9b9b9;font-family:&quot;Open Sans&quot;,sans-serif">
					<tbody>
						<tr>
							<td style="padding:10px 0 5px 0;vertical-align:top" width="300">&nbsp;</td>
							<td style="text-align:right;padding:10px 0 5px 0;vertical-align:top" width="300">&nbsp;</td>
						</tr>
					</tbody>
				</table>

				<table align="center" style="border-collapse:collapse;table-layout:fixed;Margin-left:auto;Margin-right:auto;word-wrap:break-word;word-break:break-word;background-color:#ffffff;background-position:0px 0px;background-repeat:no-repeat">
					<tbody>
						<tr>
							<td style="font-size: 14px; line-height: 21px; padding: 0px; text-align: center; vertical-align: middle; color: rgb(95, 99, 101); font-family: &quot;Open Sans&quot;, sans-serif; height: 100px; border-color: rgb(169, 207, 84);" width="600">
							<div style="Margin-left:0px;Margin-right:0px;Margin-bottom:0px;">
								<div style="line-height:0px;font-size:1px"><img alt="{{$arr_loja[0]->title}}" src="{{asset('img/logo_color.png')}}" style="margin: 0px; padding: 0px; border: none; width: 100px;" width="100" />
								</div>
							</div></td>
						</tr>
					</tbody>
				</table>

				<table align="center" style="border-collapse:collapse;table-layout:fixed;Margin-left:auto;Margin-right:auto;word-wrap:break-word;word-break:break-word;background-color:#ffffff">
					<tbody>
						<tr>
							<td style="font-size:14px;line-height:21px;padding:0;text-align:left;vertical-align:top;color:#5F6365;font-family:&quot;Open Sans&quot;,sans-serif" width="600">
							<div style="Margin-left:20px;Margin-right:20px;Margin-top:24px">
								<div style="line-height:10px;font-size:1px">
									&nbsp;
								</div>
							</div>
							<div style="Margin-left:20px;Margin-right:20px;Margin-bottom:24px">
								<h2 style="Margin-top:0;Margin-bottom:0;font-style:normal;font-weight:normal;font-size:20px;line-height:32px;color:#666666;text-align:left;"><strong>Novo contato feito pelo site {{$arr_loja[0]->site}}</strong></h2>

								<p style="Margin-top:16px;Margin-bottom:0;font-size:14px;line-height:24px;text-align:left; text-align: justify; word-wrap:break-word;">
									<span style="font-size:14px;"> Olá, houve um contato feito através do formulário do site, segue  informaç&otilde;es: </span>
								</p>

								<p style="Margin-top:16px;Margin-bottom:0;font-size:14px;line-height:24px;text-align:left; text-align: justify; word-wrap:break-word;">
									<span style="font-size:14px;"><strong>Nome: </strong>{{$nome}}</br></span>
								</p>
								
								<p style="Margin-top:16px;Margin-bottom:0;font-size:14px;line-height:24px;text-align:left; text-align: justify; word-wrap:break-word;">
									<span style="font-size:14px;"><strong>Email: </strong>{{$email}}</br></span>
								</p>

								<p style="Margin-top:16px;Margin-bottom:0;font-size:14px;line-height:24px;text-align:left; text-align: justify; word-wrap:break-word;">
									<span style="font-size:14px;"><strong>Telefone: </strong>{{$telefone}}</br></span>
								</p>

								<p style="Margin-top:16px;Margin-bottom:0;font-size:14px;line-height:24px;text-align:left; text-align: justify; word-wrap:break-word;">
									<span style="font-size:14px;"><strong>Mensagem: </strong>{{$mensagem}}</br></span>
								</p>

							</div></td>
						</tr>
					</tbody>
				</table>

				<table align="center" style="border-collapse:collapse;table-layout:fixed;Margin-left:auto;Margin-right:auto;word-wrap:break-word;word-break:break-word;background-color:#ffffff">
					<tbody>
						<tr>
							<td style="font-size: 14px; line-height: 21px; padding: 0px; text-align: left; vertical-align: top; color: rgb(95, 99, 101); font-family: &quot;Open Sans&quot;, sans-serif; background-color:#666666;;" width="600">
							<div style="Margin-left:20px;Margin-right:20px;Margin-bottom:24px">
								<div style="text-align:center">
									<p style="margin-top: 16px; margin-bottom: 0px; font-size: 14px; line-height: 24px; word-wrap: break-word;">
										<span style="color:#FFFFFF;"><span style="font-size:11px;"> {{$arr_loja[0]->fantasia}} | <a href="http://{{$arr_loja[0]->site}}">{{$arr_loja[0]->site}}</a> | {{$arr_loja[0]->email}} </span></span>
									</p>
								</div>
							</div></td>
						</tr>
					</tbody>
				</table>

				<table align="center" style="border-collapse:collapse;table-layout:fixed;color:#b9b9b9;font-family:&quot;Open Sans&quot;,sans-serif">
					<tbody>
						<tr>
							<td style="padding:10px 0 5px 0;vertical-align:top" width="300">&nbsp;</td>
							<td style="text-align:right;padding:10px 0 5px 0;vertical-align:top" width="300">&nbsp;</td>
						</tr>
					</tbody>
				</table>

				<div style="font-size:40px;line-height:40px">
					&nbsp;
				</div>
			</div>
		</center>
	</body>
</html>
