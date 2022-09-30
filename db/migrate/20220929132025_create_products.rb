class CreateProducts < ActiveRecord::Migration[7.0]
  def change
    create_table :products do |t|
      t.string :name
      t.string :cod_institute
      t.string :cod_senecyt
      t.string :physical_code
      t.text :previous_cod
      t.text :product_type
      t.text :product_serie
      t.text :product_model
      t.text :product_color
      t.text :product_material
      t.text :product_brand
      t.text :product_condition
      t.text :product_description

      t.timestamps
    end
  end
end
