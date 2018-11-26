<?php

/**
 * Obtener la última modificación de un archivo.
 *
 * @var string $file
 * @return string
 */
if( ! function_exists('lv') )
{
    function lv($file)
    {
        $filepath = public_path($file);

        $lastmodified = filemtime($filepath);

        $lastversion = "{$file}?v={$lastmodified}";
        
        return print $lastversion;
    }
}

/**
 * Validar cédula de identidad.
 *
 * @var string $ci
 * @return string
 */
if( ! function_exists('validateCedulaId'))
{
    function validateCedulaId($ci) {
        if (preg_match('/^[VvEe]{1}\-{1}\d{1,8}$/', $ci)) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Validar registro de información fiscal.
 *
 * @var string $rif
 * @return string
 */
if( ! function_exists('validateRegistroIn'))
{
    function validateRegistroIn($rif) {
        if (preg_match('/^[JjGg]{1}\-{1}\d{8}\-{1}\d{1}$/', $rif)) {
            return true;
        } else {
            return false;
        }
    }
}

if( ! function_exists('tabPersonales'))
{
    function tabPersonales($persona) {
        $active = true;

        if ($persona->isCompleteBasicData()) {
            if ($persona->isLegalEntity()) {
                if (is_null($persona->empresa->id)) {
                    return false;
                }
            }
            if ($persona->missingDocuments()) {
                return false;
            }
        }

        return $active;
    }
}

if( ! function_exists('tabEmpresa'))
{
    function tabEmpresa($persona) {
        $active = true;

        if (! $persona->isCompleteBasicData()) {
            return false;
        }

        if (! is_null($persona->empresa->id)) {
            return false;
        }

        return $active;
    }
}

if( ! function_exists('tabDocumentos'))
{
    function tabDocumentos($persona) {
        $active = true;

        if (! $persona->isCompleteBasicData()) {
            return false;
        }

        if ($persona->isLegalEntity()) {
            if (is_null($persona->empresa->id)) {
                return false;
            }
        }

        return $active;
    }
}

if( ! function_exists('unique_random') ){
    /**
     *
     * Generate a unique random string of characters
     * uses str_random() helper for generating the random string
     *
     * @param     $table - name of the table
     * @param     $col - name of the column that needs to be tested
     * @param int $chars - length of the random string
     *
     * @return string
     */
    function unique_random($table, $col, $chars = 16){

        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        do{

            // Generate random string of characters
            $random = str_random($chars);

            // Check if it's already testing
            // If so, don't query the database again
            if( in_array($random, $tested) ){
                continue;
            }

            // Check if it is unique in the database
            $count = DB::table($table)->where($col, '=', $random)->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if( $count == 0){
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters

        }
        while(!$unique);


        return $random;
    }

}
if (! function_exists('cdn'))
{
    // global CDN link helper function
    function cdn( $asset ) {

        // Verify if KeyCDN URLs are present in the config file
        if ( !Config::get('app.cdn') ) {
            return (Config::get('app.env') == "production")
            ? secure_asset( $asset )
            : asset( $asset );
        }

        // Get file name incl extension and CDN URLs
        $cdns = Config::get('app.cdn');
        $assetName = basename( $asset );

        // Remove query string
        $assetName = explode("?", $assetName);
        $assetName = $assetName[0];

        // Select the CDN URL based on the extension
        foreach( $cdns as $cdn => $types ) {
            if ( preg_match('/^.*\.(' . $types . ')$/i', $assetName) ) {
                return cdnPath($cdn, $asset);
            }
        }

        // In case of no match use the last in the array
        end($cdns);
        return cdnPath( key( $cdns ) , $asset);

    }
}

if (! function_exists('cdnPath'))
{
    function cdnPath($cdn, $asset) {
        return  (
            (Config::get('app.env') == "production")
            ? "https://"
            : "//"
        )  . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
    }
}
