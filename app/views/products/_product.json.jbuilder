json.extract! product, :id, :name, :cod_institute, :cod_senecyt, :physical_code, :previous_cod, :product_type, :product_serie, :product_model, :product_color, :product_material, :product_brand, :product_condition, :product_description, :created_at, :updated_at
json.url product_url(product, format: :json)
