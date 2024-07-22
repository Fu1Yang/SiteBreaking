<?php
declare(strict_types=1);
namespace app\SiteBreaking\router;
class NotAllowedException extends  \Exception
{
    public function __construct($message = "<p> Vous n'avez pas les droits nécessaires</p>")
        {
            parent::__construct($message, 403);
            include("./../templates/pageErreur/pageRole.php");

        }
}
