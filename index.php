<? $content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$appo = $text;
$text = strtolower($text);

header("Content-Type: application/json");
if($text=="unifi"){ //se è un comando polling
    
	$POLL_URL = 'https://www.ing-inm.unifi.it/' ;
	$parameters = array('chat_id' => $chatId, "text" => $POLL_URL);
    $parameters["method"] = "sendMessage";
    //$parameters["method"] = 'getUpdates'; *versione corretta*
	echo json_encode($parameters);
    $POLL_URL='<a href="https://kairos.unifi.it/agendaweb/index.php?view=easycourse&form-type=corso&include=corso&txtcurr=1+Anno+-+GENERICO&anno=2020&scuola=ScuoladiIngegneria&corso=B070&anno2%5B%5D=GEN%7C1&visualizzazione_orario=cal&date=10-04-2021&periodo_didattico=&_lang=it&list=0&week_grid_type=-1&ar_codes_=&ar_select_=&col_cells=0&empty_box=0&only_grid=0&highlighted_date=0&all_events=0&faculty_group=0">Orario lezioni</a>'
    $parameters["text"] = $POLL_URL;
    echo json_encode($parameters);
    $POLL_URL='[inline URL]http://webmail.stud.unifi.it/';
    $POLL_URL=POLL_URL +'&nbsp[inline URL]https://e-l.unifi.it/login/index.php';
    $parameters["text"] = $POLL_URL;
    echo json_encode($parameters);
}

if($text=="forum"){
    $parameters = array('chat_id' => $chatId, "text" => "J8GXGHVGJTPF");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="bot"){
    $parameters = array('chat_id' => $chatId, "text" => "3nciclica_S0cialista");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="github"){
    $parameters = array('chat_id' => $chatId, "text" => "4rtista_Pr3ferito Minimal");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="mail"){
    $parameters = array('chat_id' => $chatId, "text" => "Saluto");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="unifi"){
    $parameters = array('chat_id' => $chatId, "text" => "Saluto kebab");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="biblioteca"){
    $parameters = array('chat_id' => $chatId, "text" => "cod.fs., 087v9xgm");
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);
}else if($text=="metaphore"){
      $content= "Nessuno,Stato,seme versato(sboro),Età,Anthousa,Morte/Stronzata da rapper,Vita,Destino,Klan,Suicidio(TK.Squad),Setta,Casolimite,Scoperta,Disagio,Rimmel,Dio,Arte,Buio,Marco,Odino,Zeus,Tecnologia,Guai,Lampada,Nuvola,Alba,Immortalità,Infinito,Emozioni,Roma,MiaCittà,Erba.\nMondo,Ieri,Pallone,Infanzia,Sigaretta,Invidia,Rabbia,Realtà.\nTutto,Vento,Governo,Nebbia,Cuore,Futuro,Sorriso,Penna,Maschera,Musica,Lei,Tu.\nStoria,Sabato,Noia,Fede,Ora,Secondo,Giorno,Ritorno,MezzoVolo,Rondine,Attimo,Giusy,Favola),Sogno,BucoNero,Florenza,Sincerità,VitaOrdinaria.\nCoca,Saliva,PolvereDiStelle,Fuliggine,Suono,Birra,Ghiaccio,Acqua,Notte,Inferno,Canzone,Odio,Merda,Mare,Niente,Rap,Oro,LibroAperto,HipHop,Buio.\nBianca,Paura,Cataclisma,Capolavoro,Amore.\nHabibi,Lei,Flora,Europa,Qualcosa,Talento,Cosmo,Strada,Fine,Paradiso,Abbraccio,Cielo,Natura,Spia,Faccia.\nMagia,Inferno,Fama,Grana,Contante\nAmore,Roma,Corona,Fame,Ognuno,Telefono,Scarpe(DPG),Mano(TatooNoyz),Minaccia,Lui\nResto,Cicatrice,Cornice,Bocca/Testa/Notte(calda)\nOdio,Colosseo";
    $parameters = array('chat_id' => $chatId, "text" => $content);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);

}else{
$text = $appo;
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}
/*$parameters = array('chat_id' => $chatId, 'method' => 'getMe');
$res=json_encode($parameters)
echo JSON.stringify($res);*/
?>
