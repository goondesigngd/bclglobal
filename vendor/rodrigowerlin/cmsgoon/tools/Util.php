<?php

namespace Cmsgoon\tools;

use Config;
use PHPMailer;

class Util
{

    public static function getMonthInWords($month = null)
    {

        $arrMonth = array();
        $arrMonth[] = "Janeiro";
        $arrMonth[] = "Fevereiro";
        $arrMonth[] = "Março";
        $arrMonth[] = "Abril";
        $arrMonth[] = "Maio";
        $arrMonth[] = "Junho";
        $arrMonth[] = "Julho";
        $arrMonth[] = "Agosto";
        $arrMonth[] = "Setembro";
        $arrMonth[] = "Outubro";
        $arrMonth[] = "Novembro";
        $arrMonth[] = "Dezembro";

        if (is_null($month)) {
            return $arrMonth;
        }

        return $arrMonth[$month];
    }

    public static function firstWordOfSentence($value)
    {
        return ucfirst(explode(" ", $value)[0]);
    }

    public static function getExtenseMonth($dat, $delimiter = "/")
    {

        if (strlen(trim($dat)) != 0) {

            $dat = explode($delimiter, $dat);
            return self::getMonthInWords($dat[1] - 1);

        }

        return "";
    }

    /**
     * @return $thiss, else thiss does'n exists return $that
     */
    public static function getThisOrThat($thiss, $that)
    {
        return (empty($thiss) ? $that : $thiss);
    }

    /**
     * @return $thiss, else thiss does'n exists return $that
     */
    public static function getIfThisItOrThat($thiss, $it, $that = '-')
    {
        return (!empty($thiss) ? $it : $that);
    }

    public static function getLimitedCardText($text, $len = null)
    {
        if ($len) {
            return (strlen($text) > $len ? substr($text, 0, $len) . "..." : $text);
        } else {
            return $text;
        }

    }

    public static function getCurrentDate()
    {
        return date('Y-m-d');
    }

    public static function getCurrentTime($fixedSeconds = null)
    {
        $fixedSeconds = ($fixedSeconds = null ? date('s') : $fixedSeconds);
        $fixedSeconds = (empty($fixedSeconds) ? "" : ':' . $fixedSeconds);
        return date('H:i' . $fixedSeconds);
    }

    public static function getFormtedDateFromDb($dat, $format = 3, $delimiter = "/")
    {

        // 0 day
        // 1 day and month
        // 2 day, month and year
        // 3 month and year only
        // 4 year only

        if (strlen(trim($dat)) != 0) {

            $dat = explode($delimiter, $dat);

            switch ($format) {
                case 0:
                    return ($dat[2]);
                    break;
                case 1:
                    return ($dat[2] . $delimiter . $dat[1]);
                    break;
                case 2:
                    return ($dat[2] . $delimiter . $dat[1] . $delimiter . $dat[0]);
                    break;
                case 3:
                    return ($dat[1] . $delimiter . $dat[0]);
                    break;
                case 4:
                    return ($dat[0]);
                    break;
                default:
                    return "";
                    break;
            }
        }

        return "";
    }

    public static function getEmptyField($value)
    {
        return (empty($value) ? 'Sem informacao' : $value);
    }

    public static function caracteresEspeciaisDb($value)
    {
        return self::caracteresParaBanco(utf8_decode($value));
    }

    public static function caracteresEspeciaisPag($value)
    {
        return utf8_encode($value);
    }

    public static function caracteresEspeciaisTextPag($value)
    {
        return TrataCaracteres::caracteresEspeciaisPag($value);
    }

    public static function getLimitedText($text, $len = 0)
    {
        return ($len > 0 ? ((strlen($text) > $len ? substr($text, 0, $len) . "..." : $text)) : $text);
    }

    public static function getPartOfString($text, $len = 0, $index = 0)
    {

        if ($len > 0) {
            return substr($text, $index, $len);
        }

        return $text;

    }

    // OS CAMPOS INTEIROS N�O PODEM LAN�AR ZERO, POR CAUSA DAS CHAVES ESTRANGEIRAS;
    public static function controleValorZerado($value)
    {
        return $value == 0 ? 'null' : $value;
    }

    public static function formataValoresMonetarios($value)
    {
        return number_format((float) $value, 2, ",", ".");
    }

    public static function getMonetaryToApi($number, $decimal = 2)
    {
        return number_format($number, $decimal, '.', '');
    }

    public static function trataBooleanos($value)
    {
        return ($value == 'true' || $value == 't') ? true : false;
    }

    public static function getTitulosDetalhes($nome, $fantasia)
    {
        return ($nome == $fantasia ? $fantasia : $fantasia . " (" . $nome . ")");
    }

    public static function formataDatas($dat)
    {

        $pattern = '/^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$/';

        if (preg_match($pattern, trim($dat))) {
            $dat = explode('-', $dat);
            return $dat[2] . "/" . $dat[1] . "/" . $dat[0];

        }

        return "";
    }

    /**
     * Remove todos os caracteres não numericos, deixando
     * apenas os numéricos.
     *
     * @author Rodriog Werlin
     * @param $value, é o texto com os algarismos numéricos que serão tratados
     * @return se não houver numeros, retorna ZERO
     */

    public static function returnOnlyNumber($value)
    {
        return (empty($value) ? "" : (string) preg_replace("/[^0-9]/", "", $value));
    }

    /**
     * Converte valores com virgulas para ponto
     */
    public static function convertNumberToApi($string)
    {

        if (strpos($string, ",") !== false) {
            $string = str_replace(".", "", $string);
            $string = str_replace(",", ".", $string);
        }

        return $string;
    }

    public static function getTagIfExitValue($tag, $value, $label = "")
    {

        $value = trim($value);
        $tag = trim($tag);

        if (!empty($value)) {
            return " <" . $tag . ">" . $label . $value . "</" . $tag . ">";
        }
        return "";
    }

    public static function getPropFromArray(array $arrDt, $index, $prop = null, $default = null)
    {

        $value = null;
        if (count($arrDt) > 0 && isset($arrDt[$index])) {
            if (!is_null($prop)) {
                //var_dump($arrDt[$index]);
                if (is_object($arrDt[$index])) {
                    $value = $arrDt[$index]->$prop ?? null;
                } else {
                    $value = $arrDt[$index][$prop] ?? null;
                }

                // if (is_array($value)) {
                // $value = (object) $value[$index];
                // }

                if (is_string($value)) {
                    $value = trim($value);
                }

            } else {
                $value = $arrDt[$index];
            }

        }

        if ($value instanceof stdClass) {

            return $value;

        } else {
            if (empty($value)) {
                $value = $value;
            }
        }
        return ($default != null ? (empty($value) ? $default : $value) : $value);
    }

    /**
     * it's not necessáry to set indice of array like ZERO, for exemplo
     */
    public static function getPropSimpleFromArray(array $arrDt, $prop = null, $index = 0)
    {
        return self::getPropFromArray($arrDt, $index, $prop);

    }

    public static function getPaginacao($arr_result, $indexLimit = 0)
    {

        $regByPage = $arr_result[0]['limit'];

        $totalRegisters = $arr_result[0]['countwithoutlimit'];

        $obj = [];
        $obj['numpages'] = ($regByPage > 0 ? (int) ceil($totalRegisters / $regByPage) : 0);

        if ($indexLimit > 0) {
            $obj['numpages'] = ($obj['numpages'] <= $indexLimit ? $obj['numpages'] : $indexLimit);
        }

        $obj['regbypage'] = $regByPage;
        $obj['totalregisters'] = $totalRegisters;

        $obj['offset'] = $arr_result[0]['offset'];

        return $obj;
    }

    public static function setBase64Encode($value)
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    public static function getBase64Decode($value)
    {
        return base64_decode(str_pad(strtr($value, '-_', '+/'), strlen($value) % 4, '=', STR_PAD_RIGHT));
    }

    // captura URL da imagem com laravel
    public static function getUrlImage($id, $tm, $nm, $mon = "n", $dm = null, $pars = "")
    {

        $mon = ("/" . $mon);
        $dm = ($dm == null ? "" : "/" . $dm);
        $pars = ($pars == null ? "" : "/" . $pars);

        return url("img") . "/" . self::setBase64Encode($id) . "/" . $tm . "/" . str_slug($nm) . $mon . $dm . $pars;
    }

    // Monta URL da imagem com base na rota nomeada do laravel
    public static function getLinkImg($id, $tm, $nm, $mon = "n", $dm = 0)
    {
        return route("imgLink", ["id" => self::setBase64Encode($id), "tm" => $tm, "dm" => $dm, "mon" => $mon, "slug" => $nm]);
    }

    /**
     * Build SEO link for imagens from SQUENCE JSON
     */
    public static function seoImgLink($arr_img, $additional = "")
    {

        if (!isset($arr_img->extension)) {

            $arr = explode(".", $arr_img->fotogd, 2);
            $arr_img->extension = $arr[1];

        }

        return $arr_img->codfotocadastro . "_" . str_slug($additional) . "." . $arr_img->extension;

    }

    //Supri o parametro de monitoramento
    public static function getUrlImageMonitored($id, $tm, $nm, $dm = null, $pars = "")
    {

        //Supri o parametro de monitoramento fixando em S = SIM
        return self::getUrlImage($id, $tm, $nm, "S", $dm = null, $pars = "");
    }

    // captura URL dos files com laravel
    public static function getUrlFile($id, $nm = null, $pars = "")
    {
        $pars = ($pars == null ? "" : "/" . $pars);
        return url("file") . "/" . self::setBase64Encode($id) . "/" . str_slug($nm) . $pars;
    }

    // Prepara rota de arquivos carregados pelo nome
    public static function getFileFull($filename, $nm = "", $route_name = "file-full", $force = "n", $folder = "")
    {

        if ($folder == "") {
            // busca rota padrão
            // normalmente utilizado para tabelas genéricas
            return route($route_name, ['filename' => self::setBase64Encode($filename), 'force' => $force, 'nm' => str_slug($nm)]);

        }

        // busca rota passando folder de arquivos
        return route($route_name, ['filename' => self::setBase64Encode($filename), 'force' => $force, 'folder' => $folder, 'nm' => str_slug($nm)]);
    }

    // captura URL da files com laravel
    public static function getDownloadFile($id, $nm = null)
    {
        return url("file") . "/" . self::setBase64Encode($id) . "/" . str_slug($nm) . "/" . "s";
    }

    public static function getUrlAnalyser($direction, $pars = null)
    {

        $pars = ($pars == null ? "" : "/" . $pars);

        if ($direction == "") {
            return "/#" . $pars;
        }

        // direction validade
        if (self::strpos_array($direction, array('http://', 'www', 'webmail')) === 0) {

            // force http
            if (strpos($direction, 'www') === 0) {
                $direction = 'http://' . $direction;
            }
            // parametros vao criptorgrafados para que possa ser direcionado particularmente para cada rota do laravel
            return url("analyser") . "/" . self::setBase64Encode(url()->current()) . "/" . self::setBase64Encode(url($direction) . $pars);

        }

        return $direction . $pars;

    }

    public static function checkExternalLink($link)
    {

        // direction validade
        if (self::strpos_array($link, array('http')) === 0) {
            // parametros vao criptorgrafados para que possa ser direcionado particularmente para cada rota do laravel
            return url($link);
        }

        return route($link);

    }

    private static function strpos_array($haystack, $needles)
    {
        if (is_array($needles)) {
            foreach ($needles as $str) {
                if (is_array($str)) {
                    $pos = strpos_array($haystack, $str);
                } else {
                    $pos = strpos($haystack, $str);
                }
                if ($pos !== false) {
                    return $pos;
                }
            }
        } else {
            return strpos($haystack, $needles);
        }
    }

    public static function loadJson($url, array $fields = array(), $dt = "dt")
    {

        $cache = false;

        // Se for o moderador, deixa tempo indeterminado no timer
        $curlopt_connecttimeout = 10;
        $curlopt_timeou = 30;

        if (empty($url)) {
            throw new \Exception("Url nao informada em: " . __METHOD__);
        }

        /* parametros de filtro e analizadores*/
        if ($fields) {
            $fields['analizer']['linkfrom'] = URL()->previous();
            $fields['analizer']['linkto'] = URL()->current();
            $fields['analizer']['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        // valida os parametros de filtro existentes
        if (isset($fields['filter_params'])) {

            $cache = true;

            if (isset($fields['filter_params']['cache']) && $fields['filter_params']['cache'] == 'no') {
                $cache = false;
            }
        }

        if ($cache && !Util::visitorIsAdmin()) {
            $cacheControl = new \Cmsgoon\tools\CacheControl();

            $key = serialize($fields['filter_params']);

            if ($cacheControl->getData($key)) {
                return $cacheControl->result;
            }
        }

        if ($cache && !Util::visitorIsAdmin()) {

            //dd(123);
            $curlopt_connecttimeout = 0;
            $curlopt_timeou = 0;
        }

        $json = json_encode($fields);

        //$post = ($dt . "=" . $json);

        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $curlopt_connecttimeout);
        //timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, $curlopt_timeou);

        if (Config::get('app.env') == 'local') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }

        curl_exec($ch);

        //echo 'error:' . curl_error($ch);
        if ((Config::get('app.env') == 'local') && curl_error($ch)) {
            echo 'Connect msg:' . curl_error($ch) . $json;
            exit;
        }

        curl_close($ch);
        $msg = $resposta = ob_get_contents();
        ob_end_clean();

        $resposta = json_decode($resposta);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                if ($cache && !Util::visitorIsAdmin()) {

                    $cachetime = ($fields['filter_params']['cachetime'] ?? null);

                    /**
                     * Cria cache somente se houver resultados no retorno
                     */
                    if (isset($resposta->result) && count($resposta->result) > 0) {
                        $cacheControl->store($key, $resposta, $cachetime);
                    }
                }

                return $resposta;

                break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON in ' . $url;
                echo PHP_EOL;
                echo $msg;
                break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                echo ' - Unknown error';
                break;
        }

        echo PHP_EOL;
    }

    public function sendMail(array $loja, $subject, $body, array $attachment = null, $email = null, $nome = null)
    {

        $mailer = new PHPMailer();

        if (Util::getPropFromArray($loja, 0, 'mecanismoemail') == "smtp") {
            $mailer->IsSMTP();
        }

        //$mailer -> SMTPDebug = 1;
        $mailer->setLanguage('br');
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->Port = Util::getPropFromArray($loja, 0, 'port');
        $mailer->Host = Util::getPropFromArray($loja, 0, 'host');
        $mailer->SMTPAuth = (strtolower(Util::getPropFromArray($loja, 0, 'authentication')) == 't');
        $mailer->SMTPSecure = Util::getPropFromArray($loja, 0, 'secure');
        $mailer->Username = Util::getPropFromArray($loja, 0, 'username');
        $mailer->Password = Util::getPropFromArray($loja, 0, 'password');
        $mailer->Sender = Util::getPropFromArray($loja, 0, 'emailremetente');
        $mailer->FromName = Util::getPropFromArray($loja, 0, 'title');
        $mailer->From = Util::getPropFromArray($loja, 0, 'emailremetente');

        if ($email) {
            $mailer->AddAddress($email, $nome);
        } else {
            $mailer->AddAddress(Util::getPropFromArray($loja, 0, 'email'));
        }

        //$mailer -> AddAddress('contato@goondt.com');

        $mailer->Subject = $subject;
        $mailer->Body = $body;

        if ($attachment) {
            foreach ($attachment as $key => $value) {
                $mailer->AddAttachment($value->path, $value->name);
            }
        }

        if ($mailer->Send()) {
            return true;
        } else {
            throw new \Exception($mailer->ErrorInfo);
            //dd($mailer -> ErrorInfo);
            return false;
        }

    }

    /**
     * Este método é usado para simular a mesmoa funcçao do sequence
     * Este cookie dura somente 1hora
     */
    public static function setCookie($name = "_sequs", $value = "", $validade = 'md5')
    {
        // if there is cookie ok.
        if (!setcookie($name, md5($value), time() + 3600, "/")) {
            return false;
        }

        return true;

    }

    public static function getCookie($name, $value = "", $validade = 'md5')
    {
        // if there is cookie ok.
        if (isset($_COOKIE[$name])) {

            // if exists value, then it could validade it
            if ($value != "") {
                if ($_COOKIE[$name] === md5($value)) {
                    return true;
                }
                return false;
            }
            return $_COOKIE[$name];
        }
        return false;
    }

    public static function checkOwnerPublish($item)
    {

        // if public is 2 then is was able to show in the site
        if (isset($item->publicar) && (int) $item->publicar == 2) {
            if (Util::getCookie(Config::get('app.sequence_cookie_name'), Config::get('app.sequence_store'))) {
                return true;
            }
            return false;

        }

        return true;
    }

    // verificas se o visitante do site e usuario do sequence
    public static function visitorIsAdmin()
    {
        return Util::getCookie(Config::get('app.sequence_cookie_name'), Config::get('app.sequence_store'));
    }

    public static function selectedOption($par1, $par2, $return = 'selected')
    {
        return (strtolower($par1) == strtolower($par2) ? $return : '');
    }

    public function getRandomNumber()
    {
        return md5(uniqid(rand(), true));
    }

    /**
     * retorna um valor de versao para o link de JS e CSS do site
     */
    public static function getQueryStringVersion($force_version = '')
    {
        $qry_str = "?";
        if ($force_version != '') {
            $qry_str = $qry_str . $force_version;
        } else {
            $qry_str = $qry_str . Config::get('app.querystring_version');
        }

        return $qry_str;
    }

    /**
     * @return asset from especific customr for ecommerce
     */
    public static function assetCustom($schema, $path = "")
    {
        return asset($schema . "" . Config::get('app.sequence_store') . "_" . Config::get('app.sequence_codloja') . "/" . $path);
    }

    public static function paragraph($text)
    {

        // Order of replacement
        $order = array("\r\n", "\n", "\r");

        $replace = '</p><p>';
        // Processes \r\n's first so they aren't converted twice.
        return '<p>' . str_replace($order, $replace, $text) . '</p>';

    }

    /**
     * Get No Extenssion From file
     */
    public static function getNoExtenssion($file_name, $delimiter = ".")
    {
        return explode($delimiter, $file_name, 2)[0];

    }

    /**
     * Header server
     */
    public static function addHeader($head, $value = '*')
    {
        header("{$head}: {$value}");
    }

    /**
     * Replace Vars
     */
    public static function replaceVarsPub($text, $std)
    {

        if (count($std) > 0) {

            // Loop mas imagens da publicação
            for ($i = 0; $i < $std->countimgs; $i++) {

                $text = str_replace(array("[img" . ($i + 1) . "]"), Util::getUrlImage($std->imgs[$i]->codfotocadastro, 'gd', $std->titulo), $text);
                $text = str_replace(array("[alt" . ($i + 1) . "]"), $std->imgs[$i]->title, $text);

            }

            // Loop nos arquivos da publicação...

        }

        return $text;
    }

    /**
     * Return just value from attribute element html
     */
    public static function getValAttr($str, $attr)
    {
        if ($attr != "") {

            $attr .= '="';

            $point = strpos($str, $attr);

            if ($point !== false) {

                return explode("\"", substr($str, $point + strlen($attr), strlen($str)), 2)[0];

            }
        }

        return $str;
    }

    /**
     * Adiciona a tag <a> em um link dentro de um texto
     */
    public static function pegaLink($texto, $blank = true)
    {
        // Lista com os Protocolos
        $protocolos = ["http://", "https://"];

        // Percorre os protocolos
        foreach ($protocolos as $protocolo) {
            // Conta quantos links com a quele protocolo existem
            $count = substr_count($texto, $protocolo);
            // Salva a posição da última troca
            $posicao_ultima_troca = 0;

            // Percorre os itens
            for ($i = 0; $i < $count; $i++) {
                // Obtém a posição do protocolo
                $posicaoProtocolo = strpos($texto, $protocolo, $posicao_ultima_troca);
                // Ontém a posição do próximo espaço
                $posicaoEspaco = strpos($texto, " ", $posicaoProtocolo);
                // Calcula o tamanho da string do link através da posição
                $tamanhoLink = $posicaoEspaco - $posicaoProtocolo;
                // Pega o link na string
                $link = substr($texto, $posicaoProtocolo, $tamanhoLink);

                // Verifica se deve adicionar o atributo blank
                if ($blank) {
                    // Adiciona a tag <a>
                    $linkComHref = "<a href='" . $link . "' target='_blank'>" . substr($link, strlen($protocolo)) . "</a>";
                } else {
                    // Adiciona a tag <a>
                    $linkComHref = "<a href='" . $link . "'>" . substr($link, strlen($protocolo)) . "</a>";
                }

                // Substitui o link pelo link com a tag
                $texto = substr_replace($texto, $linkComHref, $posicaoProtocolo, $tamanhoLink);
                // Salva a posição da última troca
                $posicao_ultima_troca = $posicaoEspaco;
            }
        }

        // retorna o novo texto
        return $texto;
    }

}
