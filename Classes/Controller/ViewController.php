<?php

declare(strict_types=1);

namespace Taketool\Webalizer\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\AsController;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

#[AsController]
class ViewController extends ActionController
{
    private $extKey = 'webalizer';
    private ExtensionConfiguration $extensionConfiguration;
    private ModuleTemplateFactory $moduleTemplateFactory;
    private IconFactory $iconFactory;

    public function __construct(
        ExtensionConfiguration $extensionConfiguration,
        ModuleTemplateFactory  $moduleTemplateFactory,
        IconFactory            $iconFactory
    )
    {
        $this->extensionConfiguration = $extensionConfiguration;
        $this->iconFactory = $iconFactory;
        $this->moduleTemplateFactory = $moduleTemplateFactory;
    }

    public function indexAction(): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);

        $webPath = '';
        $site = $this->request->getAttribute('site') ?? [];
        $isSiteSelected = (get_class($site) === 'TYPO3\CMS\Core\Site\Entity\Site');

        if ($isSiteSelected) {
            try {
                $webPath = $site->getAttribute('webalizerShowPath');
            } catch (\InvalidArgumentException $e) {
                $webPath = 'https://www.taketool.de/';
            }
        }

        $this->view->assignMultiple([
            'webPath' => $webPath,
            'isSiteSelected' => $isSiteSelected,
        ]);

        // adding a page-shortcut button
        $routeIdentifier = 'system_webalizer'; // array-key of the module-configuration
        $buttonBar = $moduleTemplate->getDocHeaderComponent()->getButtonBar();
        $shortcutButton = $buttonBar->makeShortcutButton()
            ->setDisplayName('Shortcut to my action')
            ->setRouteIdentifier($routeIdentifier);
        $shortcutButton->setArguments(['controller' => 'ViewController', 'action' => 'index']);
        $buttonBar->addButton($shortcutButton, ButtonBar::BUTTON_POSITION_RIGHT);

        $moduleTemplate->setContent($this->view->render());
        return $this->htmlResponse($moduleTemplate->renderContent());
    }
}
