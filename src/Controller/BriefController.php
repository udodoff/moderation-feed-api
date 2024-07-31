<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class BriefController extends AbstractController
{
    #[Route('/api/brief/list', name: 'brief_list', methods: 'GET')]
    public function getBriefList()
    {
        $unviewed_brief_list = array_fill(0, 10, [
            "id" => 1,
            "advertLink" => "https://www.farpost.ru/vladivostok/tech/communication/cellphones/iphone-15-pro-128gb-rassrochka-trade-in-garantija-1-god-116360874.html",
            "publishDate" => 1234567,
            "publishDateString" => "08:46, сегодня",
            "ownerId" => 1234567,
            "ownerLogin" => "CoolUser",
            "ownerLink" => "https://www.farpost.ru/company/TehnoSet/",
            "bulletinSubject" => "Заголовок объявления",
            "bulletinText" => "В связи с расширением отдела мы ищем сотрудника в нашу большую команду #ФАРПОСТВСЕСВОИ Если ты общительный и любознательный, мечтаешь построить карьеру, найти друзей и изменить мир к лучшему, то нам по пути. Ты будешь: - принимать входящие звонки от пользователей сайтов FarPost.ru, VL.ru, Drom.ru; - помогать пользователям решать самые разные задачи и находить выход из нестандартных ситуаций.Никаких продаж и «холодных» звонков! Юность и отсутствие опыта - не помеха. Наша команда и специалист по обучению помогут тебе стать крутым профи в общении с клиентами. Обучение будет состоять из нескольких этапов теории и практики. При этом ты будешь официально оформлен уже с первого рабочего дня.",
            "bulletinImages" => ["https://static.baza.farpost.ru/v/1510541224458_hugeBlock"],
        ]); 

        foreach($unviewed_brief_list as &$brief) {
            $brief["id"] = random_int(57438, 36467382);
            if($brief["id"] % 3 == 0) $brief["bulletinImages"] = ["https://static.baza.farpost.ru/v/1510541224458_hugeBlock", "https://static.baza.farpost.ru/v/1510541224458_hugeBlock"];  
        }

        return $this->json($unviewed_brief_list)
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    #[Route('/api/brief/review', name: 'review_brief', methods: 'POST')]
    public function saveReviewedBriefList(Request $request): JsonResponse
    {
        return $this->json(json_decode($request->getContent(), true));
    }
}
