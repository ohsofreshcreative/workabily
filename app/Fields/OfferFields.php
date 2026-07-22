<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class OfferFields extends Field
{
	public function fields(): array
	{
		$offer = new FieldsBuilder('offer_fields', [
			'title'    => 'Opis oferty',
			'position' => 'side',
		]);

		$offer
			->setLocation('post_type', '==', 'offer')
			->addWysiwyg('offer_description', [
				'label'        => 'Opis (rich text)',
				'tabs'         => 'visual',
				'toolbar'      => 'full',
				'media_upload' => false,
			]);

		return [$offer];
	}
}
