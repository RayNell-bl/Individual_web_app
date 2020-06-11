SELECT t.technique_id, t.inv_number, t.name, t.model_id, m.name, t.date_buy, t.price, o.name FROM technique t
INNER JOIN models m ON t.model_id=m.model_id
INNER JOIN room r ON t.room_id=r.room_id
INNER JOIN otdel o ON r.otdel_id=o.otdel_id

SELECT p.name, o.name, r.name, r.ploshad FROM pred p
INNER JOIN otdel o ON p.pred_id=o.pred_id, o.parent_id=o.otdel_id
INNER JOIN room r ON r.otdel_id=o.otdel_id

