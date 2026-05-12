<?php

namespace Database\Seeders;

use App\Models\Redirect;
use Illuminate\Database\Seeder;

class RedirectSeeder extends Seeder
{
    /**
     * All 54 redirects from the 7x Basket Redirection Sheet.
     *
     * Keys   = from_path  (old URL path, no domain)
     * Values = to_path    (new URL path, no domain)
     */
    public function run(): void
    {
        $redirects = [

            // ── 27 bare-slug → /blogs/{new-slug} ──────────────────────────────

            '/indian-grocery-store-franchises'
                => '/blogs/the-rise-of-indian-grocery-store-franchises',

            '/grocery-retail-in-india'
                => '/blogs/grocery-retail-trends-in-india',

            '/grocery-retail-market'
                => '/blogs/midlife-career-change-with-7xbasket',

            '/grocery-franchise-in-india'
                => '/blogs/7xbasket-pan-india-grocery-vision',

            '/grocery-store'
                => '/blogs/top-reasons-why-opening-a-grocery-store-in-india-is-a-smart-investment',

            '/grocery-store-in-india'
                => '/blogs/top-mistakes-to-avoid-when-launching-a-grocery-store-in-india',

            '/grocery-store-franchise-in-india'
                => '/blogs/scale-business-with-7xbasket-grocery-store-franchise',

            '/franchise-grocery-store'
                => '/blogs/grocery-franchise-vs-independent-grocery-store',

            '/supermarket-business-franchise'
                => '/blogs/top-reasons-to-invest-in-a-supermarket-franchise-business',

            '/top-5-reasons-to-start-a-supermarket-business-in-2025'
                => '/blogs/reasons-to-start-a-supermarket-business',

            '/best-franchise-grocery-store'
                => '/blogs/invest-smartly-in-best-grocery-store-franchise',

            '/supermarket-franchise-cost'
                => '/blogs/7xbasket-affordable-supermarket-franchise',

            '/best-grocery-store-franchise'
                => '/blogs/step-into-success-with-best-grocery-store-franchise',

            '/indian-grocery-franchise'
                => '/blogs/path-to-success-with-7xbasket',

            '/supermarket-franchise-in-india'
                => '/blogs/how-to-start-a-supermarket-franchise-with-7xbasket',

            '/grocery-mart-franchise'
                => '/blogs/best-investment-for-profitable-retail-growth',

            '/super-market-franchise'
                => '/blogs/your-gateway-to-profitable-retail-business',

            '/grocery-store-franchise-cost'
                => '/blogs/grocery-store-franchise-investment-breakdown',

            '/mini-grocery-store-franchise'
                => '/blogs/why-mini-grocery-store-franchise-is-a-smart-investment',

            '/best-grocery-franchise'
                => '/blogs/best-grocery-franchise-business-opportunity-with-7xbasket',

            '/mini-supermarket-franchise'
                => '/blogs/mini-supermarket-franchise-opportunity-with-7xbasket',

            '/top-5-supermarket-franchises-growing-in-india'
                => '/blogs/top-growing-supermarket-franchises-in-india',

            '/best-supermarket-franchise-in-india'
                => '/blogs/why-7xbasket-is-best-supermarket-franchise',

            '/grocery-store-franchise'
                => '/blogs/7xbasket-premier-grocery-store-franchise-opportunity',

            '/supermarket-franchise'
                => '/blogs/comprehensive-guide-to-supermarket-franchise',

            '/supermarket-business-franchises-in-india'
                => '/blogs/popularity-of-supermarket-business-franchises',

            '/cost-of-opening-a-supermarket'
                => '/blogs/true-cost-of-opening-a-supermarket',

            // ── 27 old /blogs/{slug} → /blogs/{new-slug} ──────────────────────

            '/blogs/indian-grocery-store-franchises'
                => '/blogs/the-rise-of-indian-grocery-store-franchises',

            '/blogs/grocery-retail-in-india'
                => '/blogs/grocery-retail-trends-in-india',

            '/blogs/grocery-retail-market'
                => '/blogs/midlife-career-change-with-7xbasket',

            '/blogs/grocery-franchise-in-india'
                => '/blogs/7xbasket-pan-india-grocery-vision',

            '/blogs/grocery-store'
                => '/blogs/top-reasons-why-opening-a-grocery-store-in-india-is-a-smart-investment',

            '/blogs/grocery-store-in-india'
                => '/blogs/top-mistakes-to-avoid-when-launching-a-grocery-store-in-india',

            '/blogs/grocery-store-franchise-in-india'
                => '/blogs/scale-business-with-7xbasket-grocery-store-franchise',

            '/blogs/franchise-grocery-store'
                => '/blogs/grocery-franchise-vs-independent-grocery-store',

            '/blogs/supermarket-business-franchise'
                => '/blogs/top-reasons-to-invest-in-a-supermarket-franchise-business',

            '/blogs/top-5-reasons-to-start-a-supermarket-business-in-2025'
                => '/blogs/reasons-to-start-a-supermarket-business',

            '/blogs/best-franchise-grocery-store'
                => '/blogs/invest-smartly-in-best-grocery-store-franchise',

            '/blogs/supermarket-franchise-cost'
                => '/blogs/7xbasket-affordable-supermarket-franchise',

            '/blogs/best-grocery-store-franchise'
                => '/blogs/step-into-success-with-best-grocery-store-franchise',

            '/blogs/indian-grocery-franchise'
                => '/blogs/path-to-success-with-7xbasket',

            '/blogs/supermarket-franchise-in-india'
                => '/blogs/how-to-start-a-supermarket-franchise-with-7xbasket',

            '/blogs/grocery-mart-franchise'
                => '/blogs/best-investment-for-profitable-retail-growth',

            '/blogs/super-market-franchise'
                => '/blogs/your-gateway-to-profitable-retail-business',

            '/blogs/grocery-store-franchise-cost'
                => '/blogs/grocery-store-franchise-investment-breakdown',

            '/blogs/mini-grocery-store-franchise'
                => '/blogs/why-mini-grocery-store-franchise-is-a-smart-investment',

            '/blogs/best-grocery-franchise'
                => '/blogs/best-grocery-franchise-business-opportunity-with-7xbasket',

            '/blogs/mini-supermarket-franchise'
                => '/blogs/mini-supermarket-franchise-opportunity-with-7xbasket',

            '/blogs/top-5-supermarket-franchises-growing-in-india'
                => '/blogs/top-growing-supermarket-franchises-in-india',

            '/blogs/best-supermarket-franchise-in-india'
                => '/blogs/why-7xbasket-is-best-supermarket-franchise',

            '/blogs/grocery-store-franchise'
                => '/blogs/7xbasket-premier-grocery-store-franchise-opportunity',

            '/blogs/supermarket-franchise'
                => '/blogs/comprehensive-guide-to-supermarket-franchise',

            '/blogs/supermarket-business-franchises-in-india'
                => '/blogs/popularity-of-supermarket-business-franchises',

            '/blogs/cost-of-opening-a-supermarket'
                => '/blogs/true-cost-of-opening-a-supermarket',

        ];

        foreach ($redirects as $from => $to) {
            Redirect::updateOrCreate(
                ['from_path' => $from],
                [
                    'to_path'     => $to,
                    'status_code' => 301,
                    'is_active'   => true,
                ]
            );
        }

        $this->command->info('Seeded ' . count($redirects) . ' redirects.');
    }
}
