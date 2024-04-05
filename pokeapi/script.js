
  function getImageUrl(pokemonData) {
    // 根據選擇的圖片類型獲取對應的圖片 URL
    let imageUrl = '';
    let shinyImageUrl = '';  // 新增這一行
    switch (pokemonData.imageType) {
      case 'front':
        imageUrl = pokemonData.sprites.front_default;
        shinyImageUrl = pokemonData.sprites.front_shiny;
        break;
      case 'back':
        imageUrl = pokemonData.sprites.back_default;
        shinyImageUrl = pokemonData.sprites.back_shiny;
        break;
      case 'official-artwork':
        imageUrl = pokemonData.sprites.other['official-artwork'].front_default;
        shinyImageUrl = pokemonData.sprites.other['official-artwork'].front_shiny;
        break;
      case 'Pokemon-home':
        imageUrl = pokemonData.sprites.other['home'].front_default;
        shinyImageUrl = pokemonData.sprites.other['home'].front_shiny;
        break;
      case 'showdown-front':
        imageUrl = pokemonData.sprites.other['showdown'].front_default;
        shinyImageUrl = pokemonData.sprites.other['showdown'].front_shiny;
        break;
      case 'showdown-back':
        imageUrl = pokemonData.sprites.other['showdown'].back_default;
        shinyImageUrl = pokemonData.sprites.other['showdown'].back_shiny;
        break;
      default:
        imageUrl = pokemonData.sprites.other['official-artwork'].front_default;
        shinyImageUrl = pokemonData.sprites.other['official-artwork'].front_shiny;
    }
    return {
      normal: `<img src="${imageUrl}" alt="Pokemon Image">`,
      shiny: `<img src="${shinyImageUrl}" alt="Shiny Pokemon Image">`
    };
  }
  // Generations -----------------------------------------------------------------------------
      // 獲取網址查詢字符串
      var queryString = window.location.search;

      // 解析查詢字符串
      var urlParams = new URLSearchParams(queryString);

      // 從查詢字符串中獲取 start 和 end 的值，如果沒有則使用預設值
      var start = parseInt(urlParams.get('start')) || 1;
      var end = parseInt(urlParams.get('end')) || 151;

      // 監聽所有按鈕的點擊事件
      $(".gen-button").click(function (event) {
        event.preventDefault(); // 阻止按鈕的默認行為

        // 獲取按鈕的文本（Generation 1、Generation 2等）
        var buttonText = $(this).text();

        // 定義每個世代的起始和結束數量
        var generations = {
          "Generation 1": { start: 1, end: 151 },
          "Generation 2": { start: 152, end: 251 },
          "Generation 3": { start: 252, end: 386 },
          "Generation 4": { start: 387, end: 493 },
          "Generation 5": { start: 494, end: 649 },
          "Generation 6": { start: 650, end: 721 },
          "Generation 7": { start: 722, end: 809 },
          "Generation 8": { start: 810, end: 905 },
          "Generation 9": { start: 906, end: 1025 },
          // Generation 9 到1025有bug暫時先改道999
          "Generation All": { start: 1, end: 1025 },
          // 添加其他世代的數據
        };

        // 根據按鈕文本獲取對應的數據
        var data = generations[buttonText];

        // 設置新的 start 和 end 的值
        start = data.start;
        end = data.end;

        // 將數據轉換為查詢字符串
        var queryString = $.param({ start: start, end: end });

        // 使用 window.location.href 重新導向到相同頁面並附帶查詢字符串
        window.location.href = window.location.href.split('?')[0] + "?" + queryString;

        // 將結果顯示在 result 元素中

      });

      // Generations end-----------------------------------------------------------------------------
      function getColorForType(type) {
        // 返回相應屬性的顏色
        switch (type) {
            case 'normal':
                return '#A8A878'; // Normal - 灰色
            case 'fire':
                return '#F08030'; // Fire - 橙色
            case 'water':
                return '#6890F0'; // Water - 藍色
            case 'electric':
                return '#F8D030'; // Electric - 黃色
            case 'grass':
                return '#78C850'; // Grass - 綠色
            case 'ice':
                return '#98D8D8'; // Ice - 淺藍色
            case 'fighting':
                return '#C03028'; // Fighting - 紅色
            case 'poison':
                return '#A040A0'; // Poison - 紫色
            case 'ground':
                return '#E0C068'; // Ground - 啡色
            case 'flying':
                return '#A890F0'; // Flying - 淺藍色
            case 'psychic':
                return '#F85888'; // Psychic - 粉紅色
            case 'bug':
                return '#A8B820'; // Bug - 橄欖綠
            case 'rock':
                return '#B8A038'; // Rock - 啡色
            case 'ghost':
                return '#705898'; // Ghost - 紫色
            case 'dark':
                return '#705848'; // Dark - 深灰色
            case 'dragon':
                return '#7038F8'; // Dragon - 深紫色
            case 'steel':
                return '#B8B8D0'; // Steel - 銀色
            case 'fairy':
                return '#EE99AC'; // Fairy - 淺粉紅色
            // 添加其他屬性的顏色
            default:
                return '#000000'; // 默認為黑色
        }
    }
    