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

header("Content-Type: application/json");
if($text=="unifi"){ //se è un comando polling
	$POLL_URL = 'https://www.ing-inm.unifi.it/' ;
	$parameters = array('chat_id' => $chatId, "text" => $POLL_URL);
    $parameters["method"] = "sendMessage";
    //$parameters["method"] = 'getUpdates'; *versione corretta*
	echo json_encode($parameters);
    $parameters["method"] = "getMe";
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
      $content = "Nessuno,Età,Anthousa,Morte,VitaExtraordinaria,Destino,Gang-Klan-Setta,Casolimite,Scoperta,Disagio,Rimmel,Dio,Arte,Buio,Archimede-Marco-Odino-Zeus,Tecnologia,Guai,Lampada,Nuvola,Alba,Immortalità,Infinito,Emozioni,Roma,MiaCittà,Erba.\nMondo,Ieri,Pallone,Infanzia,Sigaretta,Invidia,Rabbia,Realtà.\nTutto,Resto(?),Vento,Governo,Nebbia,Cuore,Futuro,Sorriso,Penna,Maschera,Musica,Lei,Tu,Pace(?).\nStoria,Sabato,Noia,Fede,Ora,Secondo,Giorno,Ritorno,MezzoVolo,Rondine,Attimo,Giusy,Favola,Cuore(?),Sogno,BucoNero,Florenza,Sincerità,VitaOrdinaria.\nCoca,Saliva,PolvereDiStelle,Fuliggine,Suono,Birra,Ghiaccio,Acqua,Notte,Inferno,Canzone,Odio,Merdina,Mare,Oro,LibroAperto,HipHop,Buio.\nBianca,Paura,Cataclisma,Capolavoro,Amore.\nHabibi,Lei,Flora,Europa,Qualcosa,Talento,Cosmo,Strada,Fine,Paradiso,Cielo,Natura,Energia(?),Spia,Faccia.\nAmore,Roma,Minaccia,Lui\n";
    $parameters = array('chat_id' => $chatId, "text" => $content);
    $parameters["method"] = "sendMessage";
    echo json_encode($parameters);

}else{
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}

?>
