// (function($) {
//     $.fn.tagInput = function(options) {
//         return this.each(function() {
//             var settings = $.extend({}, { 
//                 labelClass: "label label-success" 
//             }, options);
            
//             // O elemento Ã© o input text
//             var textInput = $(this);
            
//             // Verifica se Ã© realmente um input text
//             if (!textInput.is('input[type=text]')) {
//                 console.error('TagInput: O elemento precisa ser um input type="text"');
//                 return;
//             }
            
//             // Esconde o input original
//             textInput.hide();
            
//             // Cria o container para as tags
//             var containerId = 'tag-container-' + Math.random().toString(36).substr(2, 9);
//             var tagContainer = $('<div class="tag-input-container" id="' + containerId + '"></div>');
            
//             // Cria o hidden input para armazenar os valores
//             var hiddenInput = $('<input type="hidden" name="' + textInput.attr('name') + '_tags" value="">');
            
//             // Cria o novo input text para digitar
//             var newTextInput = $('<input type="text" class="tag-input-field form-control mt-1" placeholder="Digite e pressione vírgula ou Enter">');
            
//             // Insere os elementos apÃ³s o input original
//             textInput.after(tagContainer);
//             tagContainer.append(hiddenInput);
//             tagContainer.append(newTextInput);
            
//             // Copia o valor inicial do input original para o hidden
//             var valorInicial = textInput.val();
//             if (valorInicial) {
//                 hiddenInput.val(valorInicial);
//             }
            
//             // Inicializa contador para badges
//             var badgeCounter = 0;
            
//             // Limpa valores vazios do hidden
//             function cleanUpHiddenField() {
//                 var currentVal = hiddenInput.val() || '';
//                 // Remove vÃ­rgulas extras no inÃ­cio, fim e duplicadas
//                 currentVal = currentVal.replace(/^,|,$/g, '');
//                 currentVal = currentVal.replace(/,+/g, ',');
//                 hiddenInput.val(currentVal);
                
//                 // Atualiza o input original tambÃ©m
//                 textInput.val(currentVal);
//             }
            
//             // Adiciona uma nova label
//             function addLabel(str) {
//                 if (!str || str.trim() === '') return;
                
//                 str = str.trim();
//                 badgeCounter++;
                
//                 var label = $('<span class="' + settings.labelClass + ' tagLabel" data-badge="' + badgeCounter + '">' + 
//                              str + ' <a href="#" data-badge="' + badgeCounter + 
//                              '" aria-label="close" class="closelabel">&times;</a></span>');
                
//                 // Insere antes do input de texto
//                 label.insertBefore(newTextInput);
                
//                 // Atualiza o hidden input
//                 var currentValue = hiddenInput.val();
//                 if (currentValue) {
//                     hiddenInput.val(currentValue + ',' + str);
//                 } else {
//                     hiddenInput.val(str);
//                 }
                
//                 cleanUpHiddenField();
                
//                 // Evento de clique para remover
//                 label.find('.closelabel').on('click', function(e) {
//                     e.preventDefault();
//                     var badgeId = $(this).data('badge');
//                     closeLabel(badgeId);
//                 });
//             }
            
//             // Remove uma label
//             function closeLabel(id) {
//                 var label;
//                 if (id) {
//                     label = tagContainer.find('span.tagLabel[data-badge="' + id + '"]');
//                 } else {
//                     label = tagContainer.find('span.tagLabel').last();
//                 }
                
//                 if (label.length > 0) {
//                     var labelText = label.text().replace('Ã—', '').trim();
                    
//                     // Remove do hidden input
//                     var hiddenArray = hiddenInput.val().split(',').filter(function(item) {
//                         return item.trim() !== labelText;
//                     });
                    
//                     hiddenInput.val(hiddenArray.join(','));
//                     cleanUpHiddenField();
//                     label.remove();
//                 }
//             }
            
//             // Processa o valor do input
//             function makeBadge() {
//                 var str = newTextInput.val();
//                 if (str && /\S/.test(str)) {
//                     // Divide por vÃ­rgula e processa cada item
//                     var items = str.split(',');
//                     for (var i = 0; i < items.length; i++) {
//                         var item = items[i].trim();
//                         if (item) {
//                             addLabel(item);
//                         }
//                     }
//                     newTextInput.val('');
//                 }
//             }
            
//             // Carrega valores iniciais do hidden
//             var initialValue = hiddenInput.val();
//             if (initialValue && initialValue !== '') {
//                 var defaultValues = initialValue.split(',');
//                 for (var i = 0; i < defaultValues.length; i++) {
//                     var value = defaultValues[i].trim();
//                     if (value) {
//                         addLabel(value);
//                     }
//                 }
//             }
            
//             // Eventos do teclado
//             newTextInput.on('keydown', function(event) {
//                 var str = $(this).val();
//                 if (event.keyCode === 8) { // Backspace
//                     if (str.length === 0) {
//                         var lastLabel = tagContainer.find('span.tagLabel').last();
//                         if (lastLabel.length > 0) {
//                             event.preventDefault();
//                             closeLabel();
//                         }
//                     }
//                 } else if (event.keyCode === 13) { // Enter
//                     makeBadge();
//                     event.preventDefault();
//                     return false;
//                 }
//             });
            
//             newTextInput.on('keyup', function(event) {
//                 var str = $(this).val();
//                 if (event.keyCode === 27) { // Escape
//                     $(this).val('');
//                     $(this).blur();
//                 } else if (event.keyCode === 13) { // Enter
//                     makeBadge();
//                     event.preventDefault();
//                     return false;
//                 }
                
//                 if (str.indexOf(',') >= 0) {
//                     makeBadge();
//                 }
//             });
            
//             newTextInput.on('blur', function() {
//                 makeBadge();
//             });
            
//             // Limpeza inicial
//             cleanUpHiddenField();
//         });
//     };
// })(jQuery);

(function($) {
    $.fn.tagInput = function(options) {
        return this.each(function() {
            var settings = $.extend({}, {
                labelClass: "label label-success"
            }, options);

            var textInput = $(this);

            if (!textInput.is('input[type=text]')) {
                console.error('TagInput: O elemento precisa ser um input type="text"');
                return;
            }

            textInput.hide();

            var containerId = 'tag-container-' + Math.random().toString(36).substr(2, 9);
            var tagContainer = $('<div class="tag-input-container" id="' + containerId + '"></div>');
            var hiddenInput = $('<input type="hidden" name="' + textInput.attr('name') + '_tags" value="">');
            var newTextInput = $('<input type="text" class="tag-input-field form-control mt-1" placeholder="Digite e pressione vírgula ou Enter">');

            textInput.after(tagContainer);
            tagContainer.append(hiddenInput);
            tagContainer.append(newTextInput);

            var badgeCounter = 0;

            function trimValue(value) {
                if (value === null || value === undefined) {
                    return '';
                }
                return String(value).trim();
            }

            function normalizeValues(values) {
                var result = [];
                var seen = {};

                for (var i = 0; i < values.length; i++) {
                    var value = trimValue(values[i]);
                    if (value !== '' && !seen[value]) {
                        seen[value] = true;
                        result.push(value);
                    }
                }

                return result;
            }

            function getValues() {
                var currentVal = hiddenInput.val() || '';
                if (trimValue(currentVal) === '') {
                    return [];
                }
                return normalizeValues(currentVal.split(','));
            }

            function setValues(values) {
                var normalized = normalizeValues(values);
                var joined = normalized.join(',');

                hiddenInput.val(joined);
                textInput.val(joined);
            }

            function cleanUpHiddenField() {
                setValues(getValues());
            }

            function escapeHtml(str) {
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }

            function renderLabel(str) {
                if (!str || trimValue(str) === '') return;

                str = trimValue(str);
                badgeCounter++;

                var label = $(
                    '<span class="' + settings.labelClass + ' tagLabel" data-badge="' + badgeCounter + '">' +
                        escapeHtml(str) +
                        ' <a href="#" data-badge="' + badgeCounter + '" aria-label="close" class="closelabel">&times;</a>' +
                    '</span> '
                );

                label.insertBefore(newTextInput);

                label.find('.closelabel').on('click', function(e) {
                    e.preventDefault();
                    closeLabel($(this).data('badge'));
                });
            }

            function renderAllLabels() {
                tagContainer.find('span.tagLabel').remove();
                badgeCounter = 0;

                var values = getValues();
                for (var i = 0; i < values.length; i++) {
                    renderLabel(values[i]);
                }
            }

            function addValue(str) {
                str = trimValue(str);
                if (str === '') return;

                var values = getValues();

                if ($.inArray(str, values) !== -1) {
                    return;
                }

                values.push(str);
                setValues(values);
                renderAllLabels();
            }

            function closeLabel(id) {
                var label;

                if (id) {
                    label = tagContainer.find('span.tagLabel[data-badge="' + id + '"]');
                } else {
                    label = tagContainer.find('span.tagLabel').last();
                }

                if (label.length > 0) {
                    var labelClone = label.clone();
                    labelClone.find('a').remove();
                    var labelText = trimValue(labelClone.text());

                    var values = getValues().filter(function(item) {
                        return item !== labelText;
                    });

                    setValues(values);
                    renderAllLabels();
                }
            }

            function makeBadge() {
                var str = newTextInput.val();

                if (str && /\S/.test(str)) {
                    var items = str.split(',');

                    for (var i = 0; i < items.length; i++) {
                        var item = trimValue(items[i]);
                        if (item !== '') {
                            addValue(item);
                        }
                    }

                    newTextInput.val('');
                }
            }

            function loadInitialValues() {
                var valorInicial = textInput.val();

                if (!valorInicial || trimValue(valorInicial) === '') {
                    setValues([]);
                    renderAllLabels();
                    return;
                }

                var values = normalizeValues(valorInicial.split(','));
                setValues(values);
                renderAllLabels();
            }

            loadInitialValues();

            newTextInput.on('keydown', function(event) {
                var str = $(this).val();

                if (event.keyCode === 8) {
                    if (str.length === 0) {
                        var lastLabel = tagContainer.find('span.tagLabel').last();
                        if (lastLabel.length > 0) {
                            event.preventDefault();
                            closeLabel();
                        }
                    }
                } else if (event.keyCode === 13) {
                    makeBadge();
                    event.preventDefault();
                    return false;
                }
            });

            newTextInput.on('keyup', function(event) {
                var str = $(this).val();

                if (event.keyCode === 27) {
                    $(this).val('');
                    $(this).blur();
                } else if (event.keyCode === 13) {
                    makeBadge();
                    event.preventDefault();
                    return false;
                }

                if (str.indexOf(',') >= 0) {
                    makeBadge();
                }
            });

            newTextInput.on('blur', function() {
                makeBadge();
            });

            cleanUpHiddenField();
        });
    };
})(jQuery);