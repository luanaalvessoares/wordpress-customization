# WooCommerce - Desabilitar Edição de Campos de Endereço Após Preenchimento Automático

### Descrição
Este repositório fornece uma solução para desabilitar a edição de campos de endereço no WooCommerce após o preenchimento automático via CEP. A solução foi desenvolvida para contornar problemas onde, após o preenchimento automático dos campos (endereço, bairro, cidade, estado), o usuário ainda conseguia editar esses campos manualmente. Além disso, o desafio incluía garantir que os valores dos campos fossem corretamente submetidos ao formulário, mesmo após serem desabilitados.

### Problema
No WooCommerce, ao utilizar um preenchimento automático de endereço baseado no CEP, os campos de endereço podem ser editados manualmente, o que pode resultar em dados inconsistentes. Além disso, simplesmente desabilitar esses campos com disabled impede que seus valores sejam enviados no formulário, causando erros de validação do WooCommerce.

### Solução
A solução envolve o uso de readonly para campos de texto e um método de desabilitação para o campo select (estado), garantindo que os dados sejam enviados corretamente, enquanto a edição dos campos é bloqueada.

### Funcionalidades
• Desabilita campos de texto (endereço, bairro, cidade) com readonly.
• Desabilita o campo select de estado, garantindo que seu valor seja enviado por um campo oculto.
• Preserva a experiência do usuário com estilização visual dos campos desativados.
• Garante a submissão correta dos dados no checkout e no formulário de perfil.

### Implementação
#### Passo 1: Adicionar o Código ao seu Tema ou Plugin
Adicione o código do arquivo **app.php** dessa pasta ao arquivo **functions.php** do seu tema filho ou em um plugin customizado.

#### Passo 2: Testar no Checkout e no Perfil de Usuário
• **Checkout:** Ao preencher o CEP no checkout, os campos de endereço serão automaticamente preenchidos e desabilitados. O campo select de estado será desabilitado, mas seu valor será enviado corretamente.
• **Perfil de Usuário:** Ao adicionar ou editar um endereço no perfil, o mesmo comportamento se aplica, garantindo que os campos sejam desabilitados após o preenchimento do CEP.

#### Passo 3: Personalizar (Opcional)
Se necessário, ajuste as cores e estilos no código CSS para melhor corresponder ao tema do seu site.

### Conclusão
Essa solução resolve o problema de edição de campos após o preenchimento automático no WooCommerce, garantindo que os valores sejam corretamente submetidos e melhorando a consistência dos dados no checkout e no perfil do usuário.