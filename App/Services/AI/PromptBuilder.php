<?php

namespace App\Services\AI;

class PromptBuilder
{

    public static function bio(array $data): string
    {

        return "

You are an expert technical recruiter and professional resume writer.

Write a professional portfolio biography.

Requirements:

- 100-150 words
- First person
- Natural English
- ATS friendly
- No emojis
- No bullet points
- Do not invent information
- Highlight technologies and practical experience


Candidate:

Name:
{$data['name']}


Target Role:
{$data['targetRole']}


Years Experience:
{$data['yearsExperience']} years


Technologies and Tools:

" . implode(', ', $data['technologies']) . "


Education:

{$data['degree']}
{$data['fieldOfStudy']}
{$data['university']}


Location:

{$data['location']}


Career Goal:

{$data['targetRole']}

";
    }


public static function featuredProject(array $projects): string
{

    return <<<PROMPT

You are an expert software engineering portfolio reviewer.

Your task is to evaluate projects and decide which projects deserve to appear as "Featured Projects" in a professional developer portfolio.

IMPORTANT RULES:

- Do NOT give a high score only because all fields are completed.
- Complete information only means the project is eligible for evaluation.
- Most projects should receive a score between 40 and 75.
- Scores above 80 should be rare and only for exceptional projects.
- A score of 90+ should be extremely uncommon.

Evaluate each project based on:

1. Technical Complexity (30%)
- Architecture quality
- Advanced technologies
- Algorithms
- Scalability
- Engineering challenges

2. Innovation and Uniqueness (20%)
- Is the idea different?
- Does it solve a meaningful problem?

3. Real-world Value (20%)
- Is it useful for real users?
- Does it solve an actual problem?

4. Implementation Quality (20%)
- Technology choices
- Code quality indicators
- Professional development practices

5. Portfolio Impact (10%)
- Would this impress a professional recruiter?

Scoring:

0-40:
Incomplete, simple, tutorial-level, or weak project.

41-60:
Basic project with limited complexity.

61-75:
Good project but common or limited innovation.

76-85:
Strong professional project with good technical depth.

86-95:
Exceptional project demonstrating advanced skills.

96-100:
Almost world-class project. Very rare.

Return ONLY valid JSON.

Format:

[
 {
    "id": project_id,
    "score": number,
    "reason": "short explanation"
 }
]


Projects:

PROMPT

.
json_encode($projects, JSON_PRETTY_PRINT);

}}
