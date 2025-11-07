<?php
class Article
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $sql = "SELECT a.*, u.name AS author_name 
                FROM articles a
                JOIN users u ON a.author_id = u.id
                ORDER BY a.created_at DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content, $author_id, $image = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, content, image, author_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $content, $image, $author_id]);
    }

    public function update($id, $title, $content, $image = null)
    {
        if ($image) {
            $stmt = $this->pdo->prepare("UPDATE articles SET title=?, content=?, image=? WHERE id=?");
            return $stmt->execute([$title, $content, $image, $id]);
        } else {
            $stmt = $this->pdo->prepare("UPDATE articles SET title=?, content=? WHERE id=?");
            return $stmt->execute([$title, $content, $id]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
