
<p>
mysql table
    catagories
    cat_id = primary key, string
    cat_name = string
        api/category = get = lists aall
        api/category/{cat_id} = get = list particular
        api/category/ = post = form data{"cat_id":{},"cat_name":{}} , create cat
        api/category/{cat_id} = delete 
            precaus:
                adding same cat_id's return error msg "cat already present"
       
             
  table
    products
    p_id = primarykey , string
    p_name = string
    cat_id = Foreign key = string
        api/product = get = lists aall
        api/product/{p_id} = get = list particular
        api/product/ = post = form data{"p_id":{},"p_name":{}, "cat_id":{} } , create product
        api/product/{p_id} = delete 
            precaus:
                adding same p_id return error msg:
                adding new Prod with unkown cat_id returns error msg
</p>
