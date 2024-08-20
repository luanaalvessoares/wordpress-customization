function bloquear_campos_endereco_js() {
    if ( is_checkout() || is_account_page() ) {
        ?>
        <style>
            /* Estilo campos readonly */
            #shipping_address_1[readonly], 
            #shipping_neighborhood[readonly], 
            #shipping_city[readonly], 
            #shipping_state {
                background-color: #f7f7f7!important;
            }

            /* Estilo para desativar visualmente o select */
            #shipping_state.disabled-select {
                pointer-events: none;
                background-color: #f7f7f7!important;
            }
        </style>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                
                function aplicarRegrasCampos() {
                    var cep = $('#shipping_postcode').val();

                    if (cep.length < 8) {
                        $('#shipping_address_1, #shipping_neighborhood, #shipping_city').val('').prop('readonly', false);
                        $('#shsipping_state').removeClass('disabled-select').prop('disabled', false);
                        $('#shipping_state_hidden').remove();
                    } else {
                        $('#shipping_address_1, #shipping_neighborhood, #shipping_city').prop('readonly', true); // IDs dos campos que deseja travar
                        
                        var selectedState = $('#shipping_state').val();

                        // Desabilitar o select do estado
                        $('#shipping_state').addClass('disabled-select').prop('disabled', true);
                        
                        // Criar um campo oculto para enviar o valor do estado
                        if (!$('#shipping_state_hidden').length) {
                            $('<input>').attr({
                                type: 'hidden',
                                id: 'shipping_state_hidden',
                                name: 'shipping_state',
                                value: selectedState
                            }).appendTo('#shipping_state').parent();
                        } else {
                            $('#shipping_state_hidden').val(selectedState);
                        }
                    }
                }

                // Monitorar mudanças no CEP
                setInterval(function() {
                    aplicarRegrasCampos();
                }, 500);

                // Aplicar as regras no carregamento inicial
                aplicarRegrasCampos();
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'bloquear_campos_endereco_js', 100);
