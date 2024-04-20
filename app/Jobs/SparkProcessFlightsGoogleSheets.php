<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Client;
use Revolution\Google\Sheets\Sheets;
class SparkProcessFlightsGoogleSheets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client();
        $client->setScopes([\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS]);
// setup Google Client
// ...

        $service = new \Google\Service\Sheets($client);
        $client->useApplicationDefaultCredentials();
        $client->setAuthConfig([
            "type" => "service_account",
            "project_id" => "sparkvirtual-206921",
            "private_key_id" => "b537a87dfc0bcc901e41d2e49b89c9b932f4f814",
            "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC9XNz6l67GfLjb\n2RJw9yks6c5gVcgJBPJaPMlZRjprhZm57v9N421f53JOF1SxQejqt5qqEz4oHxSs\nKWJwZnraIWPIfzBZWAoC8F9QtlsISSGGhattvi+yxd2ZwmDy7zo8SgQW5d1/BWFD\nhMv+QDapbI27iJM6CMzG8B//20+tkG8LlzVHTdos0faPXAl/ZIbvN7MDzR+Q44sB\nOdHIUSHIp97aMBV5uPZL2BldEAiUkxq1nN34sfVElfqeWaEmmaGewYCZcGOE6Oeu\nrPjAhOV8RTDjlKgmAcsSNaHSUvdMxYMMZScNzBUxNfBQHB8kleCzhjb4MFl2wqDV\nHZflRrlnAgMBAAECggEACOkSPY5z+xi1ACSrlqTitfTTMRBIRzhe3mUm2lcQz6zB\nNOZsnVx6xz0A/Btim6wCIEKpz0qe2EzMxbnKzTGH+AoDLn+MUF/xVKhn68iGPxJl\n4Upv7Hbluq/52KQ0uKm4yqEhpnbZiy0UdxS2yUzPOv4F1fxmunUzNuySAjxDzbho\ngmhLdy3ywMtVgnETG1Yywg5mizImCierKwZB6J/wfuGIjKoXZ/cMw2aL9j8iR+8p\njhOE3NPQ9dtR0Z4bG0NSIxNhWuLAYOsVgaRXf/PzUxVA1O9PTctDzxm7OO8Y3ntA\nR9bApZQGp6D3aSN2yaO10svMcOIx9SlltHvtUZFANQKBgQDymt3RfAS3xrhDF6Qo\n/ho9jAOoXyqSUjYg+RxYRx9CnD5E13CXqME1W1WQtJiY9wWdhAn8DapG9I/1e3cy\nWnpVPsvaJbrKX2BHdp88NbhM6yX7Oxr1m3YbrEA0L9km+EMd16MUDouRxu5IO1Fw\nWHwGXQqr6BqJd9Nkzxd5/5Pk9QKBgQDH0W/5kQf5bOLtqjmb/BVbj2ifU4PGkXPK\nL9fjG5I2fbG37z3xZObQVCtsKPo4uVbaaXMX50sbBLFxPS2qfrfYFNg90ah1y+HU\nhsNbwGcFCQA5leyG4Zt6Er+DBk0AuHKdZhfUErDFFHKZVmyicoQEN7dHizl64Jdc\noUowwXGLawKBgQCwDN4HFJ4/1n8EgPVpoevc2ewVlOnJwMry5pNBJGt05Pjy7/wO\nsjFyzNKs7cEGz8tNYPH17NyyHOsS0wPOkIXRsn4v0c1Y6hluApDPGpShjMrFI0EP\nFj+BGWCF/mrwspvR3hfDiEKUCO4FkLYqdquZ2o7R7N7E/yVyNC3vJB5ouQKBgBkj\nczftlBhAJ6iI0uiZ5UH4n8vzoM95exzDuiBbVqC+XX5rfdqBvDwXasMXwKskPhYK\nUC2ArsU+aOh7LuSVPqHTtYTJfK0dMlMfhTJk2VEb2chk4TXy6jGIbEmaoFNn4RuG\nPZczpsOUl/pMkiw5xfwV2lwI2vlnigNgU0og/BzzAoGBANFbMXRrFKBd95V6zxU7\nQFYDgt8M6Gj0ds0DYXI78ZZpAtKtoALfJfpiR7o4uH6wJZsTVFNe47yjyK93wKKC\nJcKlykGfKVQF/doqVFPHTtMzJWvKls+TULBML0myEpZj8y69QFPuU5vJptDU1+3Q\nPgtU8H4epI4kjbzUNerUCPhI\n-----END PRIVATE KEY-----\n",
            "client_email" => "googlesheets@sparkvirtual-206921.iam.gserviceaccount.com",
            "client_id" => "106130188921560762391",
            "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
            "token_uri" => "https://oauth2.googleapis.com/token",
            "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
            "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/googlesheets%40sparkvirtual-206921.iam.gserviceaccount.com",
            "universe_domain" => "googleapis.com"
        ]);
        $sheets = new Sheets();
        $sheets->setService($service);

        $client = $service->getClient();
        //dd($service);
        $all_sheets = $sheets->spreadsheet('1fmlhiAn4RMDKRVp10VcCdKFzXMVA3ooSSfxD45eRsdg')->sheetList();

        $rows = $sheets->sheet("//Subfleet_Aliases")->get();

        $header = $rows->pull(0);
        $subfleet_groups = $sheets->collection(header: $header, rows: $rows);
        //dd($subfleet_groups);
        foreach($all_sheets as $sheet) {

            if (str_starts_with($sheet, "//")) {
                continue;
            }
            // Extract the values from the sheet
            $rows = $sheets->sheet($sheet)->get();

            $header = $rows->pull(0);
            $values = $sheets->collection(header: $header, rows: $rows);
            dd($subfleet_groups);
            // Now, Extract the Subfleet Macros


        }
    }
}
